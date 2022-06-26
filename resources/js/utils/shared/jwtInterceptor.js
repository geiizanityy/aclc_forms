import axios from "axios";
import store from "../../store/index";
import vueCookie from 'vue-cookie';

import SecureLS from "secure-ls";
const ls = new SecureLS({ isCompression: false });

const jwtInterceptor = axios.create({});

jwtInterceptor.interceptors.request.use((config) => {
    const aw = JSON.parse(ls.get('vuex'))
    console.log(aw.auth.isTokenActive)
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
            console.log("YAWA EXPIRED NA ANG TOKEN NIMO!")
            var access_token = vueCookie.get('token')
            const refresh_token = vueCookie.get('refresh_token')
            console.log(access_token)

            const payload = {
                token:access_token,
            };

            var response = await axios.post(
                'http://localhost:8000/api/auth/refresh',
                payload
            );
            error.config.headers[
                "Authorization"
            ] = `bearer ${response.data.access_token}`;

            return axios(error.config);
        } else {
            return Promise.reject(error);
        }
    }
);


export default jwtInterceptor;
