<template>
  <v-app>
    <div v-if="isLogin">
      <loader />
    </div>
    <v-main>
      <v-container class="fill-height">
        <v-row justify="center">
          <v-col cols="12" sm="8" md="6">
            <v-card class="elavation-12">
              <v-card-title class="loginheader">
                <v-row class="mt-15">
                     <div class="text-center">
                       <v-icon size="100" class="white--text">mdi-account-lock</v-icon>
                       <h1  class="text-h4 white--text text-center text-uppercase font-weight-bold mt-5">Sign in</h1>
                   </div>
                </v-row>
              </v-card-title>
              <v-container>
                  <v-form
                @submit.prevent="validate"
                class="pt-5"
                ref="form"
                lazy-validation
              >
                <v-text-field
                  prepend-inner-icon="mdi-account"
                  label="Username"
                  outlined
                  required
                  color="black"
                ></v-text-field>

                <v-text-field
                  label="Password"
                  outlined
                  prepend-inner-icon="mdi-lock"
                ></v-text-field>

                <v-card-actions>
                  <v-btn
                    color="blue accent-2"
                    class="mr-4 white--text"
                    type="submit"
                  >
                    Login
                  </v-btn>
                </v-card-actions>
              </v-form>
              </v-container>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>
<script>
import logo from './../../../public/images/src/logo.png'
export default {
    data() {
        return {
            logo:logo
        }
    },
  mounted() {
    document.getElementById("par").style.height = "100vh";
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
.paralaxLogin {
  height: 100vh;
}

#loginRight {
  background: #ef5350;
}
</style>