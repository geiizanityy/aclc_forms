import axios from "axios";
import store from "../../store/index";
import vueCookie from 'vue-cookie';

import SecureLS from "secure-ls";
const ls = new SecureLS({ isCompression: false });

const jwtInterceptor = axios.create({});

jwtInterceptor.interceptors.request.use((config) => {
  const authData = vueCookie.get('token')
  console.log(authData)
  config.headers.common["Authorization"] = `bearer ${authData}`;
  return config;
});

jwtInterceptor.interceptors.response.use(
    (response) => {
        return response;
    },
    async (error) => {
        const originalConfig = error.config;
        console.log(originalConfig)
        if(originalConfig.url !== 'http://localhost:8000/api/auth/refresh' && error.response) {
            if (error.response.status === 401 && !originalConfig._retry) {
                originalConfig._retry = true;
                console.log("YAWA EXPIRED NA ANG TOKEN NIMO!")
                const tkn = vueCookie.get('token')
                console.log(tkn)
                const payload = {
                    refreshToken:tkn,
                };
                console.log(payload)

                const response = await jwtInterceptor.post('http://localhost:8000/api/auth/refresh',payload)

                error.config.headers.common[
                    "Authorization"
                ] = `bearer ${response.data.access_token}`;
                vueCookie.set('token',response.data.access_token,{ expires: "1D" })
                return axios(error.config);
            } else {
                return Promise.reject(error);
            }
        }

    }
);


export default jwtInterceptor;
