<template>
  <nav>
    <v-app-bar app>
      <v-app-bar-nav-icon
        @click="drawer = !drawer"
        class="black--text"
      ></v-app-bar-nav-icon>
      <v-container class="d-flex">
        <v-row no-gutters>
          <v-col cols="12" md="8" sm="10">
            <v-toolbar-title class="black--text mt-3"
              >ACLC FORMS</v-toolbar-title
            >
          </v-col>
          <v-col cols="12" md="4" sm="6">
            <div class="float-right">
              <acccount></acccount>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" app id="app-sidebar" dark>
      <v-container>
        <v-row justify="center">
          <v-col cols="12">
            <v-img class="logo" :src="logo" max-height="50" max-width="50">
            </v-img>
          </v-col>
        </v-row>
      </v-container>
      <v-divider></v-divider>

      <v-list>
        <v-list-item class="white--text" to="home">
          <v-list-item-icon>
            <v-icon class="white--text">mdi-home</v-icon>
          </v-list-item-icon>

          <v-list-item-title class="v-list-item-text">Home</v-list-item-title>
        </v-list-item>

        <v-list-group class="v-list-group" :value="false">
          <v-icon slot="prependIcon" color="white">mdi-form-select</v-icon>

          <template v-slot:activator>
            <v-list-item-title class="v-list-item-title"
              >Forms</v-list-item-title
            >
          </template>
          <div class="ml-5">
            <v-list-item to="#">
              <v-list-item-icon>
                <v-icon class="white--text" small>mdi-form-select</v-icon>
              </v-list-item-icon>
              <v-list-item-title class="white--text v-list-group-item">Form Builder</v-list-item-title>
            </v-list-item>

            <v-list-item to="formlist">
              <v-list-item-icon>
                <v-icon class="white--text" small>mdi-table</v-icon>
              </v-list-item-icon>
              <v-list-item-title class="white--text v-list-group-item">Form List</v-list-item-title>
            </v-list-item>

            <v-list-item to="formsample">
              <v-list-item-icon>
                <v-icon class="white--text" small>mdi-table</v-icon>
              </v-list-item-icon>
              <v-list-item-title class="white--text v-list-group-item">Form Example</v-list-item-title>
            </v-list-item>
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
      drawer: null,
      logo: logo,
    };
  },
};
</script>
<style scoped>
.logo {
  display: block;
  margin: 0px auto;
  widows: 100%;
  height: 100%;
}
.v-list-item-text {
  color: #ffffff;
  size: 16px;
}
.v-list-group-item {
    size: 15px;
}
.v-list-item--active {
  background-color: #8e0202;
  color: #fff;
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