import Vue from "vue";
import Vuex from 'vuex'

import subject_contents from './modules/subject_contents/subjectcontents'
import subjects from './modules/subjects/subjects'

Vue.use(Vuex)
export default new Vuex.Store({
    modules:{
        subject_contents,
        subjects
    }
})
