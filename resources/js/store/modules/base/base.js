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
    UPDATE_LOADING:(state,data) => {
        state.loading.isLoading = data.data
    },



}

/* STORE ACTIONS */
const actions = {

    /* FETCH FILE DATA FROM DATABASE */


}

export default {
    state,
    getters,
    mutations,
    actions
}
