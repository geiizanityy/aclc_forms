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
      <div v-if="authtype">
        <v-list>
        <v-list-group  no-action v-for="item in setNavigation" :key="item.navtext" :append-icon="item.sublink ? 'mdi-chevron-up' : null " class="red_list" nav dense >
          <v-list-item
          slot="activator"
          :to="item.path"
            class="white--text"
            link
          >
            <v-list-item-icon>
              <v-icon class="white--text">{{ item.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-title  class="v-list-item-text">{{
              item.navtext
            }}</v-list-item-title>

          </v-list-item>

          <v-list-item v-for="sub in item.sublink" :key="sub.navtext" link>

            <v-list-item-icon>
              <v-icon class="white--text">{{ sub.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-title  class="v-list-item-text" :to="item.path">{{
              sub.navtext
            }}</v-list-item-title>

          </v-list-item>


          <!-- <v-list-group class="v-list-group" :value="false">
          <v-icon slot="prependIcon" color="white">mdi-form-select</v-icon>

          <template v-slot:activator>
            <v-list-item-title class="v-list-item-title"
              >Forms</v-list-item-title
            >
          </template>
          <div class="ml-5">
            <v-list-item :to="{ name: 'dummyroute6' }">
              <v-list-item-icon>
                <v-icon class="white--text" small>mdi-table</v-icon>
              </v-list-item-icon>
              <v-list-item-title class="white--text v-list-group-item"
                >Subject Content</v-list-item-title
              >
            </v-list-item>
          </div>
        </v-list-group> -->

          <!-- <v-list-item class="white--text" :to="{ name: 'dummyroute1' }">
          <v-list-item-icon>
            <v-icon class="white--text">mdi-form-select</v-icon>
          </v-list-item-icon>

          <v-list-item-title>Route 2</v-list-item-title>
        </v-list-item> -->
        </v-list-group>
        </v-list>
      </div>
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
    };
  },
  computed: {
    ...mapState("auth", {
      gettersAuthData: "auth",
    }),
    authtype() {
      try {
        let authUser = this.$store.getters["auth/getAuthUser"];
        const user_id = authUser?.usertype_id
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
                  navtext: "Subjects",
                  icon: "mdi-bookmark-outline",
                  sublink:[
                    {
                        navtext:"Subject 1",
                        path:{name:"student-dashboard"},
                        icon:"mdi-bookmark-outline"
                    },
                    {
                        navtext:"Subject 2",
                        path:{name:"subject-dashboard"},
                        icon:"mdi-bookmark-outline"
                    },
                    {
                        navtext:"Subject 3",
                        path:{name:"teacher-dashboard"},
                        icon:"mdi-bookmark-outline"
                    }
                  ]
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
.red_list .v-list-item-group .v-list-item--active {
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
