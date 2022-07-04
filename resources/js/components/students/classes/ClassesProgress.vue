<template>
  <v-card class="mx-auto">
    <v-app-bar dark :color="cardbg" height="35">
      <v-icon>mdi-chart-arc</v-icon>
      <v-toolbar-title class="text-h6 text-uppercase ml-2">Progress</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>
    <v-container>
        <v-row v-for="(item,i) in progress" :key="i" class="pa-1">
        <v-card color="primaryblue">
         <subj-progress :percentage="item.value" :label="item.subject"></subj-progress>

        </v-card>
        </v-row>
    </v-container>
  </v-card>
</template>

<script>
import SubjProgress from './Progress.vue'
export default {
  components:{
    SubjProgress
  },
  data() {
    return {
      cardheader: "#8e0202",
      cardbg: "#1F7087",
      progress: [
        {
          subject: "Introduction to Programming 1",
          value: 20,
          height: 20,
        },
        {
          subject: "Software Engineering",
          value: 40,
          height: 15,
        },
        {
          subject: "Free Elective 1",
          value: 60,
          height: 15,
        },
        {
          subject: "IT Major Elective 2",
          value: 80,
          height: 15,
        },
        {
          subject: "Internet Technology",
          value: 100,
          height: 15,
        },
      ],
      items: [
        {
          color: "#1F7087",
          src: "https://cdn.vuetifyjs.com/images/cards/foster.jpg",
          title: "Supermodel",
          artist: "Foster the People",
        },
        {
          color: "#952175",
          src: "https://cdn.vuetifyjs.com/images/cards/halcyon.png",
          title: "Halcyon Days",
          artist: "Ellie Goulding",
        },
      ],
    };
  },
  methods: {
    beforeEnter(el) {
      el.style.width = 0;
    },
    enter(el) {
      el.style.width = `${this.percentage}%`
      el.style.transition = `width 1s linear`
    },
  },
};
</script>
<style scoped>


.progress-bar {
  width: 100%;
  height: 50px;
}
.progress-bar label {
  color: #ffff;
}
.progress-bar .info {
  font-size: 17px;
  justify-content: space-between;
  display: flex;
  color: grey;
  text-transform: uppercase;
}
.progress-bar .info .percentage {
  font-weight: bolder;
}
.progress-bar .background-bar {
  background: #ccc;
  width: 100%;
  height: 50px;
}
.progress-bar .tracker-bar {
  background: #ff298a;
  height: 50px;
  width: 0;
  transition: width 0.5s linear;
}
</style>
