import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

import Layout from './components/layout/Layout.vue'
import LoginComponent from './components/LoginComponent.vue'
import Subjects from './components/subjects/Subjects.vue'
import PageNotFound from './components/404.vue'
import FormBuilder from './components/forms/form_builder/FormBuilder.vue'
import SubjectContentList from './components/forms/subject_contents/SubjectContentList.vue'
import FormSample from './components/forms/form_sample/FormSample.vue'

import Dashboard from './components/dashboard/Dashboard.vue'

const routes = [

    {
        path:'*',
        component:PageNotFound,
        name:'404'
    },
    {
        path:'/',
        component:LoginComponent,
        name:'login'
    },

    {
        path:'/subject',
        component:Layout,
        children:[

            {
                path:'/subjects',
                component:Subjects,
                name:'subjects'
            },
            {
                path:'/subjects/:subject_id/editcontent/:subjectcontent_id',
                component:FormBuilder,
                name:'editcontent',

            },
            {
                path:'/subjects/subjectcontents/:subject_id/',
                component:SubjectContentList,
                name:'subjectcontents',

            },
            {
                path:'/subjects/subjectcontent/:subject_id/:subjectcontent_id',
                component:FormSample,
                name:'subjectconent',
            },
            {
                path:'/dashboard',
                component:Dashboard,
                name:'dashboard'
            },
        ]
    }
]

const router = new VueRouter({
    routes,
    mode:'history',
    linkActiveClass: "active", // active class for non-exact links.
    scrollBehavior(to,from,savedPosition) {
        return {
            x:0,
            y:0
        }
    }
})



export default router
