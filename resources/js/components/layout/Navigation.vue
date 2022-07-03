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

    <v-navigation-drawer
      v-model="drawer"
      id="app-sidebar"
      dark
      absolute
      top
      temporary
    >
      <v-container>
        <v-row justify="center">
          <v-col cols="12">
            <v-img class="logo" :src="logo" max-height="50" max-width="50">
            </v-img>
          </v-col>
        </v-row>
      </v-container>
      <v-divider></v-divider>

      <v-list dense class="list text-uppercase">
        <div v-for="(item, i) in setNavigation" :key="i">
          <v-list-item link v-if="!item.sublink" :key="i" :to="item.path">
            <v-list-item-icon>
              <v-icon v-text="item.icon" size="20"></v-icon>
            </v-list-item-icon>

            <v-list-item-title v-text="item.navtext"></v-list-item-title>
          </v-list-item>

          <v-list-group v-else :value="false" no-action>
            <v-icon slot="prependIcon" size="20" v-text="item.icon"></v-icon>
            <template v-slot:activator>
              <v-list-item-title v-text="item.navtext"></v-list-item-title>
            </template>
            <v-list-item active-class="list-active" v-for="(subitem, i) in item.sublink" :key="i" :to="subitem.path" link>
              <div class="d-flex ml-n10">
                <v-list-item-icon>
                <v-icon v-text="subitem.icon" size="15"></v-icon>
              </v-list-item-icon>
              <v-list-item-title v-text="subitem.navtext" class="ml-n5"></v-list-item-title>
              </div>

            </v-list-item>
          </v-list-group>
        </div>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script>
import { mapState } from "vuex";
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
      aw: null,
      navigation: [],
      admins: [
        ["Management", "mdi-account-multiple-outline"],
        ["Settings", "mdi-cog-outline"],
      ],
      cruds: [
        ["Create", "mdi-plus-outline"],
        ["Read", "mdi-file-outline"],
        ["Update", "mdi-update"],
        ["Delete", "mdi-delete"],
      ],
    };
  },
  computed: {
    ...mapState("auth", {
      gettersAuthData: "auth",
    }),
    authtype() {
      try {
        let authUser = this.$store.getters["auth/getAuthUser"];
        const user_id = authUser?.usertype_id;
        return user_id;
      } catch (error) {
        console.log(error);
      }
    },
    setNavigation() {
      try {
        switch (this.authtype) {
          case 1:
          case 2:
            return [
              {
                navtext: "Dashboard",
                path: { name: "student-dashboard" },
                icon: "mdi-view-dashboard-outline",
              },
              {
                navtext: "My Classes",
                icon: "mdi-google-classroom",
                sublink: [
                  {
                    navtext: "ENGLISH 101 ENGLISH INTRODUCTION MATH EXAMPLE",
                    path: { name: "teacher-dashboard" },
                    icon: "mdi-bookmark-outline",
                  },
                  {
                    navtext: "Database Manangement System",
                    path: { name: "dummysubject1" },
                    icon: "mdi-bookmark-outline",
                  },
                  {
                    navtext: "introduction to programming 1",
                    path: { name: "dummysubject2" },
                    icon: "mdi-bookmark-outline",
                  },
                ],
              },
              {
                navtext: "Route 2",
                path: { name: "teacher-dashboard" },
                icon: "mdi-view-dashboard-outline",
              },
            ];
            break;
          case 3:
            return [
              {
                navtext: "Teacher",
                path: { name: "student-dashboard" },
                icon: "mdi-view-dashboard-outline",
              },
              {
                navtext: "Subjects",
                path: { name: "student-subjects" },
                icon: "mdi-bookmark-outline",
              },
            ];
            break;
          case 4:
            return [
              {
                navtext: "Student",
                path: { name: "student-dashboard" },
                icon: "mdi-view-dashboard-outline",
              },
              {
                navtext: "Subjects",
                path: { name: "student-subjects" },
                icon: "mdi-bookmark-outline",
              },
            ];
            break;
          default:
            return null;
            break;
        }
      } catch (error) {
        console.log(error);
      }

      /*  let utype_id = this.gettersAuthData.user.usertype_id
     if(utype_id === 1) {
        return [
          {
            navtext: "Dashboard",
            path: { name: "admin-dashboard" },
            icon: "mdi-view-dashboard-outline",
          },
            {
              navtext: "Subjects",
              path: { name: "admin-subjects" },
              icon: "mdi-bookmark-outline",
            }];
     }else {
        return [
          {
            navtext: "DD",
            path: { name: "admin-dashboard" },
            icon: "mdi-view-dashboard-outline",
          },
            {
              navtext: "asdas",
              path: { name: "admin-subjects" },
              icon: "mdi-bookmark-outline",
            }];
     } */
      /* switch (utype_id) {
        case 1:
        case 2:
        return [
          {
            navtext: "Dashboard",
            path: { name: "admin-dashboard" },
            icon: "mdi-view-dashboard-outline",
          },
            {
              navtext: "Subjects",
              path: { name: "admin-subjects" },
              icon: "mdi-bookmark-outline",
            }];
          break;

        case 3:
          return [
          {
            navtext: "Dashboard",
            path: { name: "stu-dashboard" },
            icon: "mdi-view-dashboard-outline",
          },
            {
              navtext: "Subjects Teacher",
              path: { name: "teacher-subjects" },
              icon: "mdi-bookmark-outline",
            }];
          break;
        case 4:

          return [
          {
            navtext: "Dashboard",
            path: { name: "student-dashboard" },
            icon: "mdi-view-dashboard-outline",
          },
            {
              navtext: "Subjects",
              path: { name: "student-subjects" },
              icon: "mdi-bookmark-outline",
            }];
          break;

        default:
          return null;
          break;
      } */
    },
  },
  watch: {
    group() {
      this.drawer = false;
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
.list .v-list-item--active .v-list-group--active {
   background-color: #8e0202 !important;
  color: #ffffff;
}
.list .list-active {
  background-color: #8e0202 !important;
  color: #ffffff !important;
}
.v-list-item-text {
  color: #ffffff;
  size: 16px;
}
.v-list-item {
  width: 100%;
}
.v-list-item-title {
  color: #ffffff;
  width: 100%;
}
.v-list-item--active {
  background-color: #8e0202 !important;
  color: #ffffff;
}
.v-list-item .v-list-group:hover {
  background-color: #8e0202 !important;
  color: #ffffff;
  width: 100%;
}
.v-list-group__header__append-icon {
  display: none !important;
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
