<template>
  <nav>
    <v-app-bar app dark id="app-bar">
      <v-app-bar-nav-icon
        @click="drawer = !drawer"
        class="white--text"
      ></v-app-bar-nav-icon>
      <v-toolbar-title> Learning Management System </v-toolbar-title>
      <v-spacer></v-spacer>

      <v-text-field
        class="mt-7 mr-3"
        outlined
        label="Search"
        prepend-inner-icon="mdi-magnify"
        dense
      >
      </v-text-field>

      <acccount></acccount>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" id="app-sidebar" dark absolute top temporary>
      <v-container>
        <v-row justify="center">
          <v-col cols="12">
            <v-img class="logo" :src="logo" max-height="50" max-width="50">
            </v-img>
          </v-col>
        </v-row>
      </v-container>
      <v-divider></v-divider>

      <v-list class="red_list" nav dense>

          <v-list-item class="white--text" :to="{name:'dashboard'}">
            <v-list-item-icon>
              <v-icon class="white--text">mdi-view-dashboard-outline</v-icon>
            </v-list-item-icon>

            <v-list-item-title class="v-list-item-text">Dashboard</v-list-item-title>
          </v-list-item>

          <v-list-item class="white--text" :to="{name:'subjects'}">
            <v-list-item-icon>
              <v-icon class="white--text">mdi-bookmark-outline</v-icon>
            </v-list-item-icon>

            <v-list-item-title class="v-list-item-text">Subjects</v-list-item-title>
          </v-list-item>


        <v-list-group class="v-list-group" :value="false">
          <v-icon slot="prependIcon" color="white">mdi-form-select</v-icon>

          <template v-slot:activator>
            <v-list-item-title class="v-list-item-title"
              >Forms</v-list-item-title
            >
          </template>
          <div class="ml-5">
            <v-list-item :to="{name:'subjectcontents'}">
              <v-list-item-icon>
                <v-icon class="white--text" small>mdi-table</v-icon>
              </v-list-item-icon>
              <v-list-item-title class="white--text v-list-group-item"
                >Subject Content</v-list-item-title
              >
            </v-list-item>
            <!-- </router-link> -->

            <!-- <router-link :to="{name:formsample}">
            <v-list-item to="formsample">
              <v-list-item-icon>
                <v-icon class="white--text" small>mdi-table</v-icon>
              </v-list-item-icon>
              <v-list-item-title class="white--text v-list-group-item"
                >Form Example</v-list-item-title
              >
            </v-list-item>
            </router-link> -->
          </div>
        </v-list-group>

        <v-list-item class="white--text" to="route2">
          <v-list-item-icon>
            <v-icon class="white--text">mdi-form-select</v-icon>
          </v-list-item-icon>

          <v-list-item-title>Route 2</v-list-item-title>
        </v-list-item>

        <v-list-item class="white--text" to="route3">
          <v-list-item-icon>
            <v-icon class="white--text">mdi-table</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Route 3</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    asdasd
  </nav>
</template>

<script>
import logo from "./../../../../public/images/src/logo.png";
import Acccount from "./Account.vue";
export default {
  components: {
    Acccount,
  },
  data() {
    return {
      drawer: false,
      group: null,
      logo: logo,
    };
  },
  watch: {
      group () {
        this.drawer = false
      },
    },
};
</script>
<style scoped>
#app-bar {
  background-color: #0f112d;
}
.logo {
  display: block;
  margin: 0px auto;
  widows: 100%;
  height: 100%;
}
.red_list .v-list-item-group .v-list-item--active{
  background-color: red;
  color: white;
}
.v-list-item-text {
  color: #ffffff;
  size: 16px;
}
.v-list-group-item {
  size: 15px;
}
.active {
  background-color: #8e0202;
  color: #fff;
}
.v-list-item--active {
    background-color: #8e0202;
    color:#fff;
}
.v-list-group {
  color: #ffffff;
}
.v-list-item-title {
  color: #ffffff;
}
.v-list-group {
  color: #ffffff;
}

#app-header {
  background-color: #8e0202;
  color: #ffffff;
}
#app-sidebar {
  background-color: #0f112d;
  color: #ffffff;
}
</style>
