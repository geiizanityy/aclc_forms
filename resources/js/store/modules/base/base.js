import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {
        loading:{
            isLoading:false,
        },
        snackbar:{
            isVisible:false,
        },
        loaders:[],
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
    UPDATE_SNACKBAR:(state,data) => {
        state.snackbar = data
    },
    UPDATE_LOADING:(state,data) => {
        state.loading.isLoading = data
    }



}

/* STORE ACTIONS */
const actions = {

    /* FETCH FILE DATA FROM DATABASE */


}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
