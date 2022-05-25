import Vue from "vue";
import Vuex from 'vuex'

import subject_contents from './modules/subject_contents/subjectcontents'


Vue.use(Vuex)
export default new Vuex.Store({
    modules:{
        subject_contents
    }
})
