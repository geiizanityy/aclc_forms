import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {
        subjectcontent_list:[],
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
    FETCH_SUBJECTS:(state,data) => {
        state.subjectcontent_list = data.data
    },



    /* UPDATE FILE DATA FROM STORE STATES */
    UPDATE_SUBJECT:(state) => {
    },


    /* DELETE FILE DATA FROM STORE STATES */
    DELETE_SUBJECT:(state) => {

    },


    /* ADD FILE DATA FROM STORE STATES */
    ADD_SUBJECT:(state,data) => {
        state.form_list.push(data)
    }
}

/* STORE ACTIONS */
const actions = {

    /* FETCH FILE DATA FROM DATABASE */
    /* async getSubjectContentsList({commit,rootState}) {
        await axios.get('/api/subjectcontents').then((response) => {
            commit('GET_SUBJECT_CONTENTS',response.data)
        }).catch((error) => {
            console.log(error)
        }).finally(function() {
            console.log("Forms Retrieved")
        })
    }, */
   /*  async getSelectedForm({commit,rootState},id) {
        await axios.get('/api/getselectedform/'+id).then((response) => {
            commit("GET_SELECTED_FORM",response.data)
            localStorage.setItem("selected_form",JSON.stringify(response.data))
        }).catch((error) => {
            console.log(error.response.data)
        }).finally(function() {
            console.log("Selected form retrieved")
        })
    }, */


   /*  async getSingleForm({commit,state}) {
        await axios.get('/api/fetchform').then((response) => {
            commit("GET_FORMS",response.data)
        }).catch((error) => {
            console.log(error)
        }).finally(console.log("success"))
    },
 */

    /* UPDATE FILE DATA FROM DATABASE */
    async updateForm({commit}) {

    },





    /* DELETE FILE DATA FROM DATABASE */
    async deleteForm({commit}) {

    },



    /* ADD FILE TO DATABASE */
    async addForm({commit},data) {
       /*  let form = Object.assign({},data,{
            form_elements:{
                pages:[]
            }
        }) */
        /* let form = {
            form_name:data.form_name,
            form_category:data.form_category,
            form_elements:JSON.stringify({
                "title":data.form_name,
                "pages":[{
                    "name":'Page 1'
                }]
            })
        } */
        /* await axios.post('/api/addform',form).then((response) => {
            commit("ADD_FORM",response.data)
            console.log(response.data)
        }).catch((error) => {
            console.log(error.response.data)
        }).finally(function() {
            console.log("Form Added")
        }) */
    }

}

export default {
    state,
    getters,
    mutations,
    actions
}
