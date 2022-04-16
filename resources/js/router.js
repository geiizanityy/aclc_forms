import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

import Layout from './components/layout/Layout.vue'
import LoginComponent from './components/LoginComponent.vue'
import Home from './components/home/Home.vue'
import PageNotFound from './components/404.vue'
import FormBuilder from './components/forms/form_builder/FormBuilder.vue'
import FormList from './components/forms/form_list/FormList.vue'

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
                path:'/formbuilder',
                component:FormBuilder,
                name:'formbuilder'
            },
            {
                path:'/formlist',
                component:FormList,
                name:'formlist'
            },
        ]
    }
]

const router = new VueRouter({
    routes,
    mode:'history',
    linkActiveClass:'active',
    scrollBehavior(to,from,savedPosition) {
        return {
            x:0,
            y:0
        }
    }
})



export default router