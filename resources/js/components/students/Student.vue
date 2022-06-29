<template>
  <h1>Students</h1>
</template>


<script>
import { mapGetters,mapActions,mapState } from "vuex";
export default {
  computed: {
    ...mapGetters("auth", {
      gettersAuthData: "getAuthData",
    }),
    ...mapState("auth", {
        isAuthenticated:"isAuthenticated"
    }),
  },
  methods: {
    ...mapActions("auth", {
      getUser: "getAuthenticatedUser",
    }),

  },
  created() {
    console.log(this.isAuthenticated)
    if(!this.isAuthenticated) {
        this.$router.push({name:'login'})
    }else {
        this.getUser();
    }

  },
};
</script>
