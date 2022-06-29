import axios from "axios";
import router from "../../router";
import store from "../../store/index";
import vueCookie from 'vue-cookie';

import SecureLS from "secure-ls";
const ls = new SecureLS({ isCompression: false });

const jwtInterceptor = axios.create({});

jwtInterceptor.interceptors.request.use((config) => {
  const authData = vueCookie.get('token')
  config.headers.common["Authorization"] = `bearer ${authData}`;
  return config;
});

jwtInterceptor.interceptors.response.use(
    (response) => {
      return response;
    },
    async (error) => {
      if (error.response.status === 401) {
        router.push({name:'login'})
        store.state.auth.auth = {}
        store.state.auth.authData = {}
        const authdata = {
            isAuthenticated:false,
            isTokenActive:false,
            loginStatus:'unauthenticated'
        }

        store.commit("auth/UPDATE_AUTH_DATA",authdata)
                const snackbar = {
                    isVisible:true,
                    type:'error',
                    content:error.response.data
                }
                store.commit("base/UPDATE_SNACKBAR",snackbar)
                store.commit("base/UPDATE_LOADING",false)
                localStorage.removeItem("vuex");
        /* store.state.auth.isAuthenticated = false
        store.state.auth.isTokenActive = false
        store.state.auth.loginStatus = "unauthenticated"
        localStorage.removeItem("vuex");
        const snackbar = {
            isVisible:true,
            type:'error',
            content:error.response.data
        }

        store.commit("UPDATE_SNACKBAR",snackbar)
        store.commit("UPDATE_LOADING",false) */

       /*  const authData = vueCookie.get('token')
        const payload = {
          access_token: authData,
          refresh_token: "",
        };

        var response = await axios.post(
          "http://localhost:8000/api/auth/refresh",
          payload
        );
        console.log(response.data)
        error.config.headers[
          "Authorization"
        ] = `bearer ${response.data.access_token}`;
        return axios(error.config); */
      } else {
        return Promise.reject(error);
      }
    }
  );

/* jwtInterceptor.interceptors.response.use(
    (response) => {
        return response;
    },
    async (error) => {
        const originalConfig = error.config;
        console.log(originalConfig)
        if(originalConfig.url !== 'http://localhost:8000/api/auth/login' && error.response) {
            if (error.response.status === 401 && !originalConfig._retry) {
                originalConfig._retry = true;
                console.log("YAWA EXPIRED NA ANG TOKEN NIMO!")
                const tkn = vueCookie.get('token')
                console.log(tkn)
                const payload = {
                    access_token:tkn,
                };
                console.log(payload)

                const response = await jwtInterceptor.post('http://localhost:8000/api/auth/refresh',payload)

                error.config.headers.error[
                    "Authorization"
                ] = `bearer ${payload}`;
                vueCookie.set('token',response.data.access_token,{ expires: "1D" })
                return axios(error.config);
            } else {
                return Promise.reject(error);
            }
        }

    }
); */


export default jwtInterceptor;
