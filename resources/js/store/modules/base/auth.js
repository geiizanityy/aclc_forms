import axios from "axios";
import router from "./../../../router"


import jwtInterceptor from "../../../utils/shared/jwtInterceptor";
import { jwtDecrypt,tokenAlive } from "../../../utils/shared/jwthelper";

import vueCookie from 'vue-cookie'
import SecureLS from "secure-ls";
const ls = new SecureLS({ isCompression: true });




const getDefaultSate = () => {
    return {
        auth:{},
        authData: {
            tokenExp: "",
            userId: "",
            userName: "",
        },
        loginStatus: "",
        isAuthenticated:false,
        isTokenActive:false
    }
}
const state = getDefaultSate()

const getters = {
    getAuthData(state){
        return state.authData;
    },
    getLoginStatus(state) {
        return state.loginStatus;
    },
    isAuthenticated(state) {
        return state.isAuthenticated
    },
    isTokenActive(state) {
        if (!state.authData.tokenExp) {
            state.isTokenActive = false
          return false;
        }
        state.isTokenActive = true
        return tokenAlive(state.authData.tokenExp);
      },
}
const mutations = {
    AUTHENTICATED_USER: (state, data) => {
        state.auth = data
    },
    AUTH_DATA: (state, data) => {
        const jwtDecodedValue = jwtDecrypt(data.access_token);
        const newTokenData = {
            accessToken: data.access_token,
            tokenExp: jwtDecodedValue.exp,
            userId: jwtDecodedValue.sub,
            userName: jwtDecodedValue.userName,
        };
        state.authData = newTokenData;
    },
    setIsAuthenticated(state,value) {
        state.isAuthenticated = value
    },
    setLoginStatus(state, value) {
        state.loginStatus = value;
    }


}
const actions = {
    /* FETCH FILE DATA FROM DATABASE */
    async login({ commit, rootState }, payload) {
        rootState.base.loading.isLoading = true;
        await axios.post('/api/auth/login', payload).then((response) => {
            vueCookie.set('token',response.data.access_token,{ expires: "1D" })
            const data = {
                access_token: response.data.access_token,
            }
            rootState.base.snackbar = {
                isVisible: true,
                type: 'success',
                content: response.data
            }
            commit('AUTH_DATA', data)
            commit('setIsAuthenticated',true)
            commit('setLoginStatus', 'success')
            router.push({ name: "student-dashboard" });


            /* var user_type = response.data.user.user_type;
            if (user_type === "Chief" || user_type === "Staff") {
                this.$router.push({ name: "systemdashboard" });
            } else {
                this.$router.push({ name: "clientsearch" });
            } */
        })
            .catch((err) => {
                rootState.base.snackbar = {
                    isVisible: true,
                    type: 'error',
                    content: err.response.data
                }
            })
            .finally(() => {
                rootState.base.loading.isLoading = false
            });
    },

    async getAuthenticatedUser({ commit, rootState }) {
        rootState.base.loading.isLoading = true;
        try {
            var response = await jwtInterceptor.post('/api/auth/user')
            if (response && response.data) {
                commit("AUTHENTICATED_USER",response.data)
                rootState.base.loading.isLoading = false;
                console.log("success")
            }
        } catch (error) {
            rootState.base.loading.isLoading = false;
            console.log(error)
        }

    },
    async logout({ commit, rootState }) {
        rootState.base.loading.isLoading = true;
        try {
            await axios.post('/api/auth/logout').then((response) => {
                vueCookie.delete('token')
                commit('setIsAuthenticated',false)
                commit('setLoginStatus', 'failed')
                router.push({ name: "login" });
                rootState.base.snackbar = {
                    isVisible: true,
                    type: 'success',
                    content: response.data
                }
            }).catch((err) => {
                console.log(err.response.data)
            }).finally(() => {
                rootState.base.loading.isLoading = false;
            })
        } catch (error) {
            console.log(error)
        }

    },

}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
