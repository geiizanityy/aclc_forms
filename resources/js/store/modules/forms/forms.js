import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {
        forms:[]
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
    GET_FORMS:(state,data) => {
        state.forms = data
    },


    /* UPDATE FILE DATA FROM STORE STATES */
    UPDATE_FORM:(state) => {

    },


    /* DELETE FILE DATA FROM STORE STATES */
    DELETE_FORM:(state) => {

    },


    /* ADD FILE DATA FROM STORE STATES */
    ADD_FORM:(state) => {

    }
}

/* STORE ACTIONS */
const actions = {

    /* FETCH FILE DATA FROM DATABASE */
    async getForms({commit}) {

    },
    async getSingleForm({commit,state}) {
        await axios.get('/api/fetchform').then((response) => {
            commit("GET_FORMS",response.data)
        }).catch((error) => {
            console.log(error)
        }).finally(console.log("success"))
    },



    /* UPDATE FILE DATA FROM DATABASE */
    async updateForm({commit}) {

    },




    /* DELETE FILE DATA FROM DATABASE */
    async deleteForm({commit}) {

    },



    /* ADD FILE TO DATABASE */
    async addForm({commit}) {

    }

}

export default {
    state,
    getters,
    mutations,
    actions
}
