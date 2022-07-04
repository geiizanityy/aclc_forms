import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'



Vue.use(Vuetify)

const opts = {
    theme:{
        dark:false,
        themes:{
            light:{
                primaryblue: '#0f112d',
                secondary: '#8e0202',
                cardheader:'#1F7087',
                accent: '#8c9eff',
                error: '#b71c1c',
            }
        }
    },
    icons:{
        iconfont:'mdi'
    }
}
export default new Vuetify(opts)
