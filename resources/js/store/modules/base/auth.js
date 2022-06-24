import axios from "axios";
import router from "./../../../router"

const getDefaultSate = () => {
    return {
        auth:{},
    }
}
const state = getDefaultSate()

const getters = {
}
const mutations = {
    AUTHENTICATED_USER: (state,data) => {
        state.authenticated = data
    },


}
const actions = {
    /* FETCH FILE DATA FROM DATABASE */
    async login({ commit, rootState }, data) {
        rootState.base.loading.isLoading = true;
        await axios.post('/api/auth/login',data).then((response) => {
            rootState.base.snackbar = {
                isVisible:true,
                type:'success',
                content:response.data
            }
            router.push({ name: "student-dashboard" });
                localStorage.setItem("a_tkn", response.data.access_token);

                /* var user_type = response.data.user.user_type;
                if (user_type === "Chief" || user_type === "Staff") {
                    this.$router.push({ name: "systemdashboard" });
                } else {
                    this.$router.push({ name: "clientsearch" });
                } */
            })
            .catch((err) => {
                rootState.base.snackbar = {
                    isVisible:true,
                    type:'error',
                    content:err.response.data
                }
            })
            .finally(() => {
                rootState.base.loading.isLoading = false
            });
    },

    async getAuthenticatedUser({commit,rootState}) {
        rootState.base.loading.isLoading = true;
        try {
            await axios.post('/api/auth/user').then((response) => {
                console.log(response.data)
            }).catch((err) => {
                console.log(err.response.data)

            }).finally(() => {
                rootState.base.loading.isLoading = false;
            });
        } catch (error) {
            console.log(error)
        }

    },
    async logout({commit,rootState}) {
        rootState.base.loading.isLoading = true;
        try{
            await axios.post('/api/auth/logout').then((response) => {
                localStorage.removeItem('a_tkn')
                console.log(response.data)
            }).catch((err) => {
                console.log(err.response.data)
            }).finally(() => {
                rootState.base.loading.isLoading = false;
            })
        }catch(error) {
            console.log(error)
        }

    }

}

export default {
    state,
    getters,
    mutations,
    actions
}
