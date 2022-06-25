<template>
    <v-app>
        <navigation></navigation>
        <v-main>
            <app-content></app-content>
        </v-main>
    </v-app>
</template>
<script>
import AppContent from './Content.vue'
import Navigation from './Navigation.vue'
export default {
    components:{
        Navigation,
        AppContent,

    },
    data() {
        return {
            /* token: localStorage.getItem('a_tkn') */
        }
    },
    mounted() {
        /* window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
        console.log(this.token)
        if(this.token) {
            return this.$store.dispatch("getAuthenticatedUser")
        }
 */

    }
}
</script>
