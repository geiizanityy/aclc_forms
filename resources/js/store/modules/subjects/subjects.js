import axios from "axios";


/* STORE STATES */
const getDefaultSate = () => {
    return {
        teacher_subjects:[],
        selected_subject:{}

    }
}

/* DEFAULT STORE STATES */
const state = getDefaultSate()


/* STORE GETTERS */
const getters = {
    getSelectedSubject:(state) => (subject_id) => {
        return state.teacher_subjects.filter(item => item.subject_id === subject_id)
    }
}

/* STORE MUTATIONS */
const mutations = {
    /* FETCH FILE DATA FROM STORE STATES */
    FETCH_SUBJECTS:(state,data) => {
        state.subjectcontent_list = data.data
    },

    GET_TEACHER_SUBJECTS:(state,data) => {
        state.teacher_subjects = data
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
    },
    GET_SELECTED_SUBJECT:(state,data) => {
        state.selected_subject = data
    }

}

/* STORE ACTIONS */
const actions = {

    /* FETCH FILE DATA FROM DATABASE */
    async getSubjectList({commit,rootState}) {
        await axios.get('/api/subjects').then((response) => {
            commit('GET_SUBJECT_CONTENTS',response.data)
        }).catch((error) => {
            console.log(error)
        }).finally(function() {
            console.log("Forms Retrieved")
        })
    },
    async getTeacherSubjects({commit,rootState},id) {
        await axios.get('/api/teachsubject/'+id).then((response) => {
            commit('GET_TEACHER_SUBJECTS',response.data.data)
        }).catch((error) => {
            console.log(error)
        }).finally(function() {
            console.log("Techer Subjects Retrieved")
        })
    },




    /* UPDATE FILE DATA FROM DATABASE */
    async updateForm({commit}) {

    },





    /* DELETE FILE DATA FROM DATABASE */
    async deleteForm({commit}) {

    },

    async getSelectedSubject({commit},subject_id) {
        console.log(subject_id)
        await axios.get('/api/subject/'+subject_id).then((response) => {
            commit('GET_SELECTED_SUBJECT',response.data)
        }).catch((error) => {
            console.log(error)
        }).finally(function() {
            console.log("Selected Subject Retrieved")
        })
    }


 
}

export default {
    state,
    getters,
    mutations,
    actions
}
