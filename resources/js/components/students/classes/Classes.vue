<template>
  <v-container fluid>
    <v-row dense mb->

      <v-col cols="12" md="8" sm="10">
        <classes-list></classes-list>
      </v-col>
      <v-col cols="12" md="4" sm="6">
        <div class="mb-4">
            <classes-progress></classes-progress>
        </div>
        <div>

            <calendar></calendar>
        </div>




      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import ClassesList from './ClassesList.vue'
import Calendar from './../calendar/Calendar.vue'
import ClassesProgress from './ClassesProgress.vue'
export default {
    components:{
        ClassesList,
        Calendar,
        ClassesProgress
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
