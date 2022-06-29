<template>
  <v-app>
    <snackbar></snackbar>
    <!-- MAIN COMPONENT LOGIN -->
    <v-main>
      <v-container class="fill-height fluid">
        <v-row justify="center" align="center">
          <v-col cols="12" md="5" sm="12">
            <v-card class="elavation-12 transparent" :color="vcardbg">
              <v-card-title class="loginheader">
                <v-layout justify-center>
                  <div class="text-center">

                    <v-row>
                      <v-col>
                             <v-img :src="images[0].default" max-width="120" max-height="135"></v-img>
                      </v-col>
                    </v-row>
                  </div>
                </v-layout>
              </v-card-title>

              <!-- LOGIN FORM -->
              <v-container>

                <v-form
                  @submit.prevent="save"
                  v-model="rules.isValid"
                  lazy-validation
                  class="pt-5"
                  ref="form"
                >
                  <v-text-field
                  dark
                    class="login-input"
                    prepend-inner-icon="mdi-account"
                    label="Username"
                    :rules="rules.username"
                    v-model="form.username"
                    outlined
                    dense
                    required
                    color="black"
                  ></v-text-field>

                  <v-text-field
                  dark
                    label="Password"
                    :rules="rules.password"
                    v-model="form.password"
                    outlined
                    type="password"
                    dense
                    required
                    prepend-inner-icon="mdi-lock"
                  ></v-text-field>

                  <v-card-actions>
                    <v-btn
                      color="red accent-2"
                      class="mr-4 white--text"
                      @click="save()"
                    >
                      Login
                    </v-btn>
                  </v-card-actions>
                </v-form>
              </v-container>

              <!-- / END LOGIN FORM -->
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>

    <!--/ END MAIN COMPONENT -->
  </v-app>
</template>
<script>
import { mapActions, mapGetters, mapState } from "vuex"
import snackbar from "./base/snackbar/Snacbar.vue"
import { loadImages } from "./../utils/base/loadimages"
import loading from "./base/loaders/Loading.vue"
export default {
  components: {
    loading,
    snackbar,
  },
  data() {
    return {
        imgs:{

        },
        shiwImg:false,
      vcardbg: "#1f2255",
      logo: null,
      showImg: false,
      //Form Attributes
      form: {
        username: "",
        password: "",
      },
      defaultForm: {
        username: "",
        password: "",
      },

      //Rules Validation Attributes
      rules: {
        isValid: true,
        username: [(v) => !!v || "Username is required"],
        password: [(v) => !!v || "Password is required"],
      },
    };
  },
  computed: {
    images() {
        return loadImages()
    },

    ...mapGetters("auth", {
      getterLoginStatus: "getLoginStatus",
      getIsAuthenticated: "isAuthenticated",
    }),
  },

  methods: {
    ...mapActions("auth", {
      actionLogin: "login",
    }),
    ...mapState("auth", {
        isAuthenticated:"isAuthenticated"
    }),
    /* importAll(r) {
      r.keys().forEach(r);
    }, */

    async save() {
      let isValid = this.$refs.form.validate();
      if (isValid) {
        await this.actionLogin(this.form);
      } else {
      }
    },
  },
  mounted() {

    /* importAll(
      require.context("../assets/static_images/", true, /\.jpg\.svg\.png$/)
    ); */
    /*  let logo = new Image();
    logo.onload = () => {
        console.log('img loaded');
        this.logo = logo.src
        this.showImg = true
    }
    logo.src = "http://localhost:8000/images/src/logo.png" */
  },
  created() {
    let auth = this.getIsAuthenticated;
    if (!auth) {
      localStorage.removeItem("vuex");
    }
  },
};
</script>
<style scoped>
#app {
  height: 100%;
  width: 100%;
  background-color: #1f214e;
  /* background: url("http://localhost:8000/images/src/bg13.jpg") no-repeat center
    center;
  background-size: cover; */
}
.login-input {
  color: #ffff;
}
.logincontainer {
  height: 500px;
}
.loginheader {
  background: #1f2255;
}
.login {
  background: #1f2255;
}
.logo {
  width: 60%;
  height: 100%px;
}
#loginRight {
  background: #ef5350;
}
</style>
