import axios from "axios";
import router from "./../../../router"

import jwtInterceptor from "../../../utils/shared/jwtInterceptor";
import { jwtDecrypt,tokenAlive } from "../../../utils/shared/jwthelper";

import vueCookie from 'vue-cookie'

import setAuthHeader from "../../../authheader";



const getDefaultSate = () => {
    return {
        auth:{},
        authData: {
            access_token: "",
            refresh_token: "",
            tokenExp: "",
            userId: "",
            userName: "",
        },
        loginStatus: "",
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
    isTokenActive(state) {
        if (!state.authData.tokenExp) {
          return false;
        }
        return tokenAlive(state.authData.tokenExp);
      },
}
const mutations = {
    AUTHENTICATED_USER: (state, data) => {
        state.auth = data
    },
    SAVE_TOKEN: (state, data) => {

        const jwtDecodedValue = jwtDecrypt(data.access_token);
        const newTokenData = {
            access_token: data.access_token,
            refresh_token: data.refresh_token,
            tokenExp: jwtDecodedValue.exp,
            userId: jwtDecodedValue.sub,
            userName: jwtDecodedValue.userName,
        };
        state.authData = newTokenData;
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
            vueCookie.set('token',response.data.access_token,{ expires: "5s" })
            vueCookie.set('refresh_token',"")
            const data = {
                access_token: response.data.access_token,
                refresh_token: ""
            }
            rootState.base.snackbar = {
                isVisible: true,
                type: 'success',
                content: response.data
            }
            commit('SAVE_TOKEN', data)
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
            var response = await jwtInterceptor.get('/api/auth/user')
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
                localStorage.removeItem('a_tkn')
                console.log(response.data)
            }).catch((err) => {
                console.log(err.response.data)
            }).finally(() => {
                rootState.base.loading.isLoading = false;
            })
        } catch (error) {
            console.log(error)
        }

    },
    async saveTokenToStorage({ commit, rootState }, data) {
        console.log(data)
    }

}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
