/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from "vue";


/* Vue Router */
import router from './router.js';

/* VUEX STORE */
import store from './store/index'


/* Vuetify */
import vuetify from '../plugins/vuetify.js'

import loader from 'vue-ui-preloader';
Vue.use(loader);

import VueCookie from 'vue-cookie'
Vue.use(VueCookie )

import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload)

// or with options
const loadimage = require('./../assets/base/spinner.gif')
const errorimage = require('./../assets/base/spinner.gif')

Vue.use(VueLazyload, {
  preLoad: 1.3,
  error: errorimage,
  loading: loadimage,
  attempt: 1
})




/* if(localStorage.a_tkn) {
    setAuthHeader(localStorage.a_tkn)
}else {
    setAuthHeader(false)
}

 */












/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app-component', require('./components/App.vue').default);

/* axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://localhost:8000/'
const a_tkn = localStorage.getItem('token')

if(a_tkn) {
    axios.defaults.headers.common['Authorization'] = a_tkn
}
 */


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify,
    router,
    store,
}).$mount('#app');
