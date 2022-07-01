<template>
  <v-container fluid>
    <h1>Student Dashboard</h1>
    <v-row dense>

      <v-col cols="12" md="8" sm="10"> Subject Content </v-col>
      <v-col cols="12" md="4" sm="6">
        <subject-progress></subject-progress>

      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import SubjectProgress from './SubjectProgress.vue'
export default {
    components:{
        SubjectProgress,
    },
  data() {
    return {
      progress: [
        {
          subject: "Introduction to Programming 1",
          value: 20,
          height: 15,
        },
        {
          subject: "Software Engineering",
          value: 50,
          height: 15,
        },
        {
          subject: "Free Elective 1",
          value: 40,
          height: 15,

        },
        {
          subject: "IT Major Elective 2",
          value: 90,
          height: 15,
        },
        {
          subject: "Internet Technology",
          value: 10,
          height: 15,

        },
      ],
    };
  },
};
</script>
