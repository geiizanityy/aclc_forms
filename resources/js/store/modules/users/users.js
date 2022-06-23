import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {

    }
}

/* DEFAULT STORE STATES */
const state = getDefaultSate()


/* STORE GETTERS */
const getters = {

}

/* STORE MUTATIONS */
const mutations = {
    /* FETCH FILE DATA FROM STORE STATES */
    GET_FILES: (state) => {

    },


    /* UPDATE FILE DATA FROM STORE STATES */
    UPDATE_FILE: (state) => {

    },


    /* DELETE FILE DATA FROM STORE STATES */
    DELETE_FILE: (state) => {

    },


    /* ADD FILE DATA FROM STORE STATES */
    ADD_FILE: (state) => {

    }
}

/* STORE ACTIONS */
const actions = {
    /* FETCH FILE DATA FROM DATABASE */
    async login({ commit, rootState }, data) {
        rootState.base.loading.isLoading = true;
        await axios.get("/sanctum/csrf-cookie");
        await axios.post("/api/login", data).then((response) => {
            console.log(response.data)
                /* localStorage.setItem("token", response.data.token);
                localStorage.setItem("user_type", response.data.user.user_type); */

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

}

export default {
    state,
    getters,
    mutations,
    actions
}
