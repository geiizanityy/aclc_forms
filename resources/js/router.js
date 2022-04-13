import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

import LoginComponent from './components/LoginComponent.vue'
import Home from './components/Home/Home.vue'
import PageNotFound from './components/404.vue'
import FormBuilder from './components/FormBuilder/FormBuilder.vue'

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
        path:'/formbuilder',
        component:FormBuilder,
        name:'formbuilder'
    },
    {
        path:'/home',
        component:Home,
        name:'home'
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