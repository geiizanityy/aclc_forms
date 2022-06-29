<template>
  <div>
    <v-snackbar
      v-model="snackbar"
      :color="snackbarAttrib.color"
      :multi-line="snackbarAttrib.mode === 'multi-line'"
      :timeout="snackbarAttrib.timeout"
      :top="snackbarAttrib.position === 'top'"
    >
      <v-layout align-center pr-5>
        <v-icon class="pr-3" dark large>{{ snackbarAttrib.icon }}</v-icon>

        <v-layout column>
          <div>
            <strong>{{ snackbarAttrib.title }}</strong>
          </div>
        <div v-if="snackbarAttrib.color === 'success'">
            <div v-if="snackbarAttrib.text">
                {{snackbarAttrib.text}}
            </div>
        </div>
        <div v-else>
        <div v-if="snackbarAttrib.text">
          <div>
            {{snackbarAttrib.text.error}} <br>
            <v-icon size="15">mdi-comment-alert-outline</v-icon>
              {{snackbarAttrib.text.message}}
          </div>
          </div>

          <!-- <div v-if="snackbarAttrib.text">
             <div v-for="(item,i) in snackbarAttrib.text.errors" :key="i">
              <ul v-for="(error,i) in item" :key="i" style="list-style-type:none;">
                <li>
                  <v-icon size="15">mdi-close</v-icon>
                  {{error}}
                </li>

              </ul>
            </div>
          </div> -->
        </div>

        </v-layout>
        <v-btn
          v-if="snackbarAttrib.timeout === 0"
          icon
          @click="snackbarAttrib.visible = false"
        >
          <v-icon @click="close()">mdi-close-circle-outline</v-icon>
        </v-btn>
      </v-layout>
    </v-snackbar>
  </div>
</template>

<script>
export default {
  data() {
    return {
        snackbar:false,
      buttons: [
        {
          color: "info",
          title: "Infomation",
          type: "info",
        },
        {
          color: "success",
          title: "Success",
          type: "success",
        },
        {
          color: "warning",
          title: "Warning",
          type: "warning",
        },
        {
          color: "error",
          title: "Error",
          type: "error",
        },
      ],
    };
  },
  computed: {
    //ISLOADING COMPUTED
    snackbarNotification() {
        this.snackbar = this.$store.state.base.snackbar.isVisible
        return this.$store.state.base.snackbar
    },
    snackbarAttrib() {
    if (this.snackbarNotification.type === "") return;
    let snackbar = {}
      switch (this.snackbarNotification.type) {
        case "error":
          snackbar = {
            color: "error",
            icon: "mdi-alert-circle",
            mode: "multi-line",
            position: "top",
            timeout: 5500,
            title: "Error",
            text: this.snackbarNotification.content,
            visible: true,
          };
          break;
        case "info":
          snackbar = {
            color: "info",
            icon: "mdi-information-outline",
            mode: "multi-line",
            position: "top",
            timeout: 5500,
            title: "Information",
            subtext:this.snackbarNotification.content,
            text: this.snackbarNotification.content.message,
            visible: true,
          };
          break;
        case "success":
          snackbar = {
            color: "success",
            icon: "mdi-check-circle-outline",
            mode: "multi-line",
            position: "top",
            timeout: 5500,
            title: "Success",
            subtext:this.snackbarNotification.content,
            text: this.snackbarNotification.content.message,
            visible: true,
          };
          break;
        case "warning":
          snackbar = {
            color: "warning",
            icon: "mdi-alert-outline",
            mode: "multi-line",
            position: "top",
            timeout: 5500,
            title: "Warning",
            subtext:this.snackbarNotification.content,
            text: this.snackbarNotification.content.message,
            visible: true,
          };
          break;

      }
      return snackbar
    },
    isLoading: {
      get: function () {
        return this.$store.state.base.loading.isLoading;
      },

      set: function (newVal) {
        return newVal;
      },
    },
    isVisible: {
      get: function () {
        return this.$store.state.base.snackbar.isVisible;
      },

      set: function (newVal) {
        return newVal;
      },
    },
  },
  methods: {
      close() {
          this.snackbar = false
      }
  },
};
</script>
