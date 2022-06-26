<template>
  <v-app>
    <div v-if="isLoading">
      <loading :loadertype="loginAttrib.loadertype"></loading>
    </div>

    <router-view></router-view>
  </v-app>
</template>
<script>
import {mapActions} from 'vuex';
import Loading from './base/loaders/Loading.vue'
import Navigation from "./layout/Navigation.vue";
export default {
  components: {
    Loading,
    Navigation,
  },
  data() {
    return {
      //Login Attributes
      loginAttrib: {
        loginText: "Login",
        loadertype: "circular",
        isLogin: false,
      },
    };
  },
  computed: {
    //ISLOADING COMPUTED
    isLoading: {
      get: function () {
        return this.$store.state.base.loading.isLoading;
      },
      set: function (newVal) {
        return newVal;
      },
    },
  },
  /* methods:{
     ...mapActions('auth',{
          getUser:'getAuthenticatedUser'
    }),
  },
  created() {
    this.getUser()
  } */
};
</script>

