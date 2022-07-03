<template>
  <div>
    <div v-if="getRouteName === 'student-dashboard'">
      <student-dashboard></student-dashboard>
    </div>
    <div v-else-if="getRouteName === 'student-classes'">
        <student-classes></student-classes>
    </div>
    <div v-else-if="getRouteName === 'student-enrolled-subject'">
        <student-enrolled></student-enrolled>
    </div>
    <div v-else-if="getRouteName === 'student-calendar'">
        <student-calendar></student-calendar>
    </div>
    <div v-else>
        <student-settings></student-settings>
    </div>
  </div>
</template>


<script>
import StudentDashboard from "./dashboard/StudentDashboard.vue";
import StudentClasses from './classes/Classes.vue'
import StudentEnrolled from "./enrolled/StudentSubject.vue";
import StudentCalendar from './calendar/Calendar.vue'
import StudentSettings from './user_settings/UserSettings.vue'
export default {
  components: {
    StudentClasses,
    StudentDashboard,
    StudentEnrolled,
    StudentCalendar,
    StudentSettings
  },
  computed: {
    getRouteName() {
      return this.$route.name;
    },
  },
};
</script>
