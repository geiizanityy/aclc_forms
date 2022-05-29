import Vue from "vue";
import Vuex from 'vuex'
import createdPersistedState from 'vuex-persistedstate'

import subject_contents from './modules/subject_contents/subjectcontents'
import subjects from './modules/subjects/subjects'
import content_maker from './modules/content_maker/contentmaker'

Vue.use(Vuex)
export default new Vuex.Store({
    plugins: [
        createdPersistedState()
    ],
    modules:{
        subject_contents,
        content_maker,
        subjects
    }
})
