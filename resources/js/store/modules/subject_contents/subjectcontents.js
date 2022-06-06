import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {
        subjectcontent_list:[],
        contents:[]
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
    GET_SUBJECT_CONTENTS_LIST:(state,data) => {
        state.subjectcontent_list = data
    },



    GET_SUBJECT_CONTENTS:(state,data) => {
        state.contents = data
    },



    /* UPDATE FILE DATA FROM STORE STATES */
    UPDATE_FORM:(state) => {
    },


    /* DELETE FILE DATA FROM STORE STATES */
    DELETE_FORM:(state) => {

    },


    /* ADD FILE DATA FROM STORE STATES */
    ADD_SUBJECT_CONTENT:(state,data) => {
        state.contents.push(data)
    },
    UPDATE_SUBJECT_CONTENT:(state,data) => {

    }
}

/* STORE ACTIONS */
const actions = {

    /* FETCH FILE DATA FROM DATABASE */
    async getSubjectContentsList({commit,rootState}) {
        await axios.get('/api/subjectcontents').then((response) => {
            commit('GET_SUBJECT_CONTENTS_LIST',response.data.data)
        }).catch((error) => {
            console.log(error)
        }).finally(function() {
            console.log("Subject Contents Retrieved")
        })
    },


    async getSubjectContents({commit,rootState},id) {
        await axios.get('/api/subjectcontents/'+id).then((response) => {
            commit('GET_SUBJECT_CONTENTS',response.data.data)
        }).catch((error) => {
            console.log(error)
        }).finally(function() {
            console.log("Contents Retrieved")
        })
    },



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


    async getSingleForm({commit,state}) {
        await axios.get('/api/fetchform').then((response) => {
            commit("GET_FORMS",response.data)
        }).catch((error) => {
            console.log(error)
        }).finally(console.log("success"))
    },


    /* UPDATE FILE DATA FROM DATABASE */
    async updateSubjectContent({commit},data) {
        console.log(data)
        await axios.put('/api/updatesubjectcontent/'+data.subjectcontent_id,data).then((response) => {
            console.log(response.data.data)
        }).catch((error) => {
            console.log(error.response.data)
        }).finally(console.log("success"))
    },





    /* DELETE FILE DATA FROM DATABASE */
    async deleteForm({commit}) {

    },



    /* ADD FILE TO DATABASE */
    async addContent({commit,rootState},data) {
        let content = {
            subject_id:parseInt(data.subject_id),
            topic_no:data.topic_no,
            topic_desc:data.topic_desc,
            topic_slug:data.topic_slug,
            topic_status:data.topic_status,
            topic_type:data.topic_type,
            topic_content:JSON.stringify({
                "title":"Topic Name",
                "completedHtml": "Your score is {correctedAnswers} out of {questionCount}",
                "pages":[{
                    "name":'Page 1'
                }]
            })
        }
        const subject = rootState.subjects.subjects.filter(item => item.subject_id === content.subject_id)[0]
        await axios.post('/api/addsubjectcontent',content).then((response) => {
            const subjectcontent = Object.assign({},subject,response.data.data)
            commit("ADD_SUBJECT_CONTENT",subjectcontent)
        }).catch((error) => {
            console.log(error)
        }).finally(function() {
            console.log("Form Added")
        })
    }

}

export default {
    state,
    getters,
    mutations,
    actions
}
