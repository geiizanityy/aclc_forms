<template>
  <div>
    <v-menu transition="slide-y-transition" bottom offset-y>
      <template v-slot:activator="{ on, attrs }">
      <v-avatar color="red" v-bind="attrs" v-on="on" size="30">
      <v-icon dark>
        mdi-account-circle
      </v-icon>
    </v-avatar>
      </template>

      <v-list>
        <v-list-item link>
            <v-list-item-title>
                Account Settings
            </v-list-item-title>
        </v-list-item>
        <v-list-item link @click="logout()">
            <v-list-item-title>
                Logout
            </v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>
<script>
import { mapGetters,mapActions } from "vuex";
import usericon from './../../../../public/images/src/usericon.png'
export default {
  data() {
    return {
        usericon:usericon,
    };
  },
  methods:{
    ...mapActions("auth", {
      logoutUser: "logout",
    }),

    logout() {
        this.logoutUser()
    },
    accountSettings(){

    }
  }
};
</script>
<style scoped>
.v-list-item:hover {
  background-color: #8e0202;
  transition: all 0.5s ease-in;
}
</style>
