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

import Student from './components/students/Student.vue'

import SystemAdminDashboard from './components/system/SystemDashboard.vue'

import TeacherDashboard from './components/teacher/TeacherDashboard.vue'

import Dashboard from './components/dashboard/Dashboard.vue'

const routes = [

    {
        path:'*',
        component:PageNotFound,
        name:'404'
    },
    {
        path:'/',
        component:() => import('./components/LoginComponent.vue'),
        name:'login'
    },
    {
        path:'/student',
        component:Layout,
        children:[
            {
                path:'/student/dashboard',
                component:() => import ('./components/students/Student.vue'),
                name:'student-dashboard',
            },
            {
                path:'/student/classes',
                component:() => import ('./components/students/classes/Classes.vue'),
                name:'student-classes',
            },
            {
                path:'/student/enrolledsubjects',
                component:() => import ('./components/students/Student.vue'),
                name:'student-enrolled-subjects',
            },
            {
                path:'/student/calendar',
                component:() => import ('./components/students/calendar/Calendar.vue'),
                name:'student-calendar',
            },
            {
                path:'/student/usersettings',
                component:() => import ('./components/students/user_settings/UserSettings.vue'),
                name:'student-user-settings',
            },
        ]
    },
    {
        path:'/teacher/dashboard',
        component:Layout,
        children:[
            {
                path:'/teacher/dashboard',
                component:() => import ('./components/teacher/Teacher.vue'),
                name:'teacher-dashboard',
            },
            {
                path:'/teacher/dummy',
                component:() => import ('./components/teacher/Teacher.vue'),
                name:'dummysubject1',
            },
            {
                path:'/teacher/dummy1',
                component:() => import ('./components/teacher/Teacher.vue'),
                name:'dummysubject2',
            }
        ]
    },

    {
        path:'/system/admin/dashboard',
        component:Layout,
        children:[
            {
                path:'/system/admin/dashboard',
                component:SystemAdminDashboard,
                name:'system-dashboard',
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
