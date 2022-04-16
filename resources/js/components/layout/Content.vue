<template>
  <v-container>
    <transition
      class="fade"
      enter-active-class="animate__animated animate__fadeInLeft"
      mode="out-in"
    >
      <router-view></router-view>
    </transition>
  </v-container>
</template>
<script>
export default {
    mounted() {
        console.log("Component Mounted")
    }
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: all 1s ease;
}

.fade-enter,
  .fade-leave-to
    /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}
</style>
