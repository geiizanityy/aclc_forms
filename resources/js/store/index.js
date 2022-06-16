import Vue from "vue";
import Vuex from 'vuex'
import createdPersistedState from 'vuex-persistedstate'


/* SUBJECT CONTENTS MODULES */
import subject_contents from './modules/subject_contents/subjectcontents'
import subjects from './modules/subjects/subjects'
import content_maker from './modules/content_maker/contentmaker'

/* USER MODULES */
import users from './modules/users/users'

/** BASE MODULES */
import base from './modules/base/base'

Vue.use(Vuex)
export default new Vuex.Store({
    plugins: [
        createdPersistedState()
    ],
    modules:{
        base,
        subject_contents,
        content_maker,
        subjects,
        users
    }
})
