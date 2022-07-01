<template>
  <v-card max-width="400" class="mx-auto">
    <v-app-bar dark :color="cardbg" height="35">
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
      <v-toolbar-title class="text-h6 text-uppercase">Progress</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>

    <v-container>
      <v-row dense>
        <v-card>
            <div v-for="(item,i) in progress" :key="i" class="text-uppercase">
            <h6>{{item.subject}}</h6>
          <v-progress-linear
            :color="item.value <=30 ? 'red' : item.value >=31 && item.value <=60 ? 'light-blue' : 'light-green'"
            :height="item.height"
            :value="item.value"
            striped
          >
        <strong>{{ Math.ceil(item.value) }}%</strong>
          </v-progress-linear>
        </div>
        </v-card>
      </v-row>
    </v-container>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      cardheader: "#191b4a",
      cardbg: "#1F7087",
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
};
</script>
