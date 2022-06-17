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

import Dummy from './components/dummy/Dummy.vue'

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
        path:'/student',
        component:Layout,
        children:[
            {
                path:'/student/dashboard',
                component:Dummy,
                name:'dummyroute4',
            }
        ]
    },
    {
        path:'/instructor',
        component:Layout,
        children:[
            {
                path:'/instructor/dashboard',
                component:Dummy,
                name:'dummyroute5',
            }
        ]
    },

    {
        path:'/administrator',
        component:Layout,
        children:[
            {
                path:'/administrator/dashboard',
                component:Dummy,
                name:'dummyroute6',
            }
        ]
    },

    {
        path:'/dashboard',
        component:Layout,
        children:[
            {
                path:'/dashboard',
                component:Dashboard,
                name:'dashboard',
            }
        ]
    },
    {
        path:'/dummyroute1',
        component:Layout,
        children:[
            {
                path:'/dummyroute1',
                component:Dummy,
                name:'dummyroute1',
            }
        ]
    },
    {
        path:'/dummyroute2',
        component:Layout,
        children:[
            {
                path:'/dummyroute2',
                component:Dummy,
                name:'dummyroute2',
            }
        ]
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
                path:'/subjects/subjectcontents/edit/',
                component:FormBuilder,
                name:'editcontent',

            },
            {
                path:'/subjects/subjectcontents/:subject_id/',
                component:SubjectContentList,
                name:'subjectcontents',

            },
            {
                path:'/subjects/subjectcontent/:subject_id/',
                component:FormSample,
                name:'subjectconent',
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
