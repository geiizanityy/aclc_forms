<template>
  <v-app>
    <snackbar></snackbar>
    <!-- MAIN COMPONENT LOGIN -->
    <v-main>
      <v-container class="fill-height">
        <v-row justify="center">
          <v-col cols="12" sm="8" md="6">
            <v-card class="elavation-12">
              <v-card-title class="loginheader">
                <v-row class="mt-15">
                  <div class="text-center">
                    <v-icon size="100" class="white--text"
                      >mdi-account-lock</v-icon
                    >
                    <h1
                      class="
                        text-h4
                        white--text
                        text-center text-uppercase
                        font-weight-bold
                        mt-5
                      "
                    >
                      Login
                    </h1>
                  </div>
                </v-row>
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
                      color="blue accent-2"
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
import {mapActions, mapGetters} from 'vuex';
import snackbar from './base/snackbar/Snacbar.vue'
import loading from "./base/loaders/Loading.vue";
import logo from "./../../../public/images/src/logo.png";
export default {
  components: {
    loading,
    snackbar
  },
  data() {
    return {
      logo: logo,
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
   computed:{
      ...mapGetters('auth',{
        getterLoginStatus:'getLoginStatus'
      })
    },

  methods: {
    ...mapActions('auth',{
          actionLogin:'login'
    }),
    async save() {
      let isValid = this.$refs.form.validate();
      if (isValid) {
        await this.actionLogin(this.form);
      } else {

      }
    },
  },
};
</script>
<style scoped>
#app {
  height: 100%;
  width: 100%;
  background: url("http://localhost:8000/images/src/bg13.jpg") no-repeat center
    center;
  background-size: cover;
}
.logincontainer {
  height: 500px;
}
.loginheader {
  background: #262863;
}
.logo {
  width: 60%;
  height: 100%px;
}
#loginRight {
  background: #ef5350;
}
</style>
