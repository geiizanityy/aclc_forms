<template>
    <v-app>
        <navigation></navigation>
        <v-main>
            <app-content></app-content>
        </v-main>
    </v-app>
</template>
<script>
import { mapGetters, mapActions, mapState } from "vuex";
import AppContent from './Content.vue'
import Navigation from './Navigation.vue'
export default {
    components:{
        Navigation,
        AppContent,

    },
     computed: {
    //ISLOADING COMPUTED
    ...mapGetters("auth", {
      gettersAuthData: "getAuthData",
    }),
    ...mapState("auth", {
      isAuthenticated: "isAuthenticated",
    }),

  },
  methods: {
    ...mapActions("auth", {
      getUser: "getAuthenticatedUser",
    }),
  },
  mounted() {
    if (!this.isAuthenticated) {
      this.$router.push({ name: "login" });
    } else {
      this.getUser();
    }
  },
}
</script>
