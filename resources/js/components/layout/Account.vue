<template>
  <div>
    <v-menu transition="slide-y-transition" bottom>
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          text
          v-bind="attrs"
          v-on="on"
        >
        <v-icon>mdi-account</v-icon>
          Useremail@gmail.com
          <v-icon>mdi-menu-down</v-icon>
        </v-btn>
      </template>

      <v-list>
        <v-list-item v-for="(item, i) in items" :key="i">
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>
<script>
import usericon from './../../../../public/images/src/usericon.png'
export default {
  data() {
    return {
        usericon:usericon,
      items: [
        { title: "Account Settings" },
        { title: "Logout" },
      ],
    };
  },
};
</script>
<style scoped>
.v-list-item:hover {
  background-color: #8e0202;
  transition: all 0.5s ease-in;
}
</style>
