<template>
  <div>
    <div v-if="getRouteName === 'student-dashboard'">
      <student-dashboard></student-dashboard>
    </div>
    <div v-else>
        <student-subjects></student-subjects>
    </div>
  </div>
</template>


<script>
import StudentDashboard from "./dashboard/StudentDashboard.vue";
import StudentSubjects from "./subjects/StudentSubject.vue";
import { mapGetters, mapActions, mapState } from "vuex";
export default {
  components: {
    StudentDashboard,
    StudentSubjects,
  },
  computed: {
    ...mapGetters("auth", {
      gettersAuthData: "getAuthData",
    }),
    ...mapState("auth", {
      isAuthenticated: "isAuthenticated",
    }),
    getRouteName() {
      return this.$route.name;
    },
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
