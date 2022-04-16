<template>
    <v-app id="app">
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
}
</script>
