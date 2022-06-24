import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {
        auth:{},
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
    AUTH_USER: (state,data) => {
        state.auth = data
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


}

export default {
    state,
    getters,
    mutations,
    actions
}
