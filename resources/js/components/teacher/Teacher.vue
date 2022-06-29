<template>
  <teacher-dashboard></teacher-dashboard>
</template>
<script>
import {mapGetters,mapActions,mapState} from 'vuex'
import TeacherDashboard from "./TeacherDashboard.vue";
export default {
  components: {
    TeacherDashboard,
  },
  computed: {
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
  created() {
    console.log(this.isAuthenticated);
    if (!this.isAuthenticated) {
      this.$router.push({ name: "login" });
    } else {
      this.getUser();
    }
  },
};
</script>
