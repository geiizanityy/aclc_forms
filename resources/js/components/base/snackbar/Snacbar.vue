<template>
  <div>
      {{snackbarAttrib}}
      <h1>{{snackbarNotification}}</h1>
    <v-snackbar
      v-model="snackbarNotification.isVisible"
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
          <div>{{ snackbarAttrib.text }}</div>
        </v-layout>
        <v-btn
          v-if="snackbarAttrib.timeout === 0"
          icon
          @click="snackbarAttrib.visible = false"
        >
          <v-icon>mdi-close-circle-outline</v-icon>
        </v-btn>
      </v-layout>
    </v-snackbar>
  </div>
</template>

<script>
export default {
  data() {
    return {
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
      snackbar: {
        color: null,
        icon: null,
        mode: null,
        position: "top",
        text: null,
        timeout: 7500,
        title: null,
        visible: false,
      },
      timeout: 7500,
    };
  },
  computed: {
    //ISLOADING COMPUTED
    snackbarNotification() {
        return this.$store.state.base.snackbar
    },
    snackbarAttrib() {
    if (!this.snackbarNotification.type) return;
      switch (this.snackbarNotification.type) {
        case "error":
          this.snackbar = {
            color: "error",
            icon: "mdi-alert-circle",
            mode: "multi-line",
            position: "top",
            timeout: 0,
            title: "Error",
            text: this.snackbarNotification.content.message,
            visible: true,
          };
          break;
        case "info":
          this.snackbar = {
            color: "info",
            icon: "mdi-information-outline",
            mode: "multi-line",
            position: "top",
            timeout: 0,
            title: "Information",
            text: "This is useful and is quite a long message, and won't be hidden automatically. You need to dismiss this by clicking the 'X' on the right.",
            visible: true,
          };
          break;
        case "success":
          this.snackbar = {
            color: "success",
            icon: "mdi-check-circle-outline",
            mode: "multi-line",
            position: "top",
            timeout: 7500,
            title: "Success",
            text: "That worked, hoorah.",
            visible: true,
          };
          break;
        case "warning":
          this.snackbar = {
            color: "warning",
            icon: "mdi-alert-outline",
            mode: "multi-line",
            position: "top",
            timeout: 7500,
            title: "Warning",
            text: "You probably shouldn't have seen that, oops.",
            visible: true,
          };
          break;
      }
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
    snackbarShow(type) {
     
    },
  },
};
</script>