import axios from 'axios'
import store from './store'



const setAuthHeader = (token) => {

    if(token) {
        axios.defaults.headers = {
            Authorization: 'Bearer ' +token
        }
    }else {
        delete axios.headers.Authorization
    }
}

export default setAuthHeader
