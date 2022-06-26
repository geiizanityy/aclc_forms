<template>
  <h1>Students</h1>
</template>


<script>
import { mapGetters,mapActions } from "vuex";
export default {
  computed: {
    ...mapGetters("auth", {
      gettersAuthData: "getAuthData",
    }),
  },
  methods: {
    ...mapActions("auth", {
      getUser: "getAuthenticatedUser",
    }),
  },
  created() {
    this.getUser();
  },
};
</script>
