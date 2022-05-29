import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

import Layout from './components/layout/Layout.vue'
import LoginComponent from './components/LoginComponent.vue'
import Home from './components/home/Home.vue'
import PageNotFound from './components/404.vue'
import FormBuilder from './components/forms/form_builder/FormBuilder.vue'
import SubjectContentList from './components/forms/subject_contents/SubjectContentList.vue'
import FormSample from './components/forms/form_sample/FormSample.vue'

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
        path:'/home',
        component:Layout,
        children:[
            {
                path:'/home',
                component:Home,
                name:'home'
            },
            {
                path:'/editcontent/:id',
                component:FormBuilder,
                name:'editcontent'
            },
            {
                path:'/subjectcontents/:subject_id',
                component:SubjectContentList,
                name:'subjectcontents'
            },
            {
                path:'/subjectcontent/:id',
                component:FormSample,
                name:'subjectconent'
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
