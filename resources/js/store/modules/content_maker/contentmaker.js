import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {
        editcontent:[],
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
    GET_EDIT_CONTENT:(state,data) => {
        state.editcontent = data
    },



    /* UPDATE FILE DATA FROM STORE STATES */
    UPDATE_FORM:(state) => {
    },


    /* DELETE FILE DATA FROM STORE STATES */
    DELETE_FORM:(state) => {

    },


    /* ADD FILE DATA FROM STORE STATES */
    ADD_FORM:(state,data) => {
        state.form_list.push(data)
    }
}

/* STORE ACTIONS */
const actions = {

    /* FETCH FILE DATA FROM DATABASE */

    async getSelectedForm({commit,rootState},id) {
        await axios.get('/api/geteditcontent/'+id).then((response) => {
            commit("GET_EDIT_CONTENT",response.data)
        }).catch((error) => {
            console.log(error.response.data)
        }).finally(function() {
            console.log("Selected form retrieved")
        })
    },












}

export default {
    state,
    getters,
    mutations,
    actions
}
