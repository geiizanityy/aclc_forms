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
                path:'/formbuilder/:id',
                component:FormBuilder,
                name:'formbuilder'
            },
            {
                path:'/subjectcontents',
                component:SubjectContentList,
                name:'subjectcontents'
            },
            {
                path:'/formsample/:id',
                component:FormSample,
                name:'formsample'
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
