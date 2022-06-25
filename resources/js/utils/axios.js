import axios from "axios";

let refresh = false;

const setup = axios.interceptors.response.use(resp => resp, async error => {
    if (error.response.status === 401 && !refresh) {
        refresh = true;

        const {status, data} = await axios.post('/api/auth/refresh', {}, {
            withCredentials: true
        });

        if (status === 200) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${data.access_token}`;

            return axios(error.config);
        }
    }
    refresh = false;
    return error;
});

export default setup
