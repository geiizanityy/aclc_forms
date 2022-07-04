<template>

      <div class="progress-bar transparent" id="progress" ref="progress">
        <div class="progress-container">
          <label class="transparent">{{ label }}</label>
          <label class="percentage">{{ percentage }}% </label>
        </div>
        <transition appear @before-appear="beforeEnter" @after-appear="enter">
          <div class="tracker-bar"></div>
        </transition>
      </div>

</template>

<script>
export default {
    props:{
        percentage:Number,
        label:String
    },
  data() {
    return {
      cardheader: "#8e0202",
      cardbg: "#1F7087",
    };
  },
  methods: {
    beforeEnter(el) {
      el.style.width = 0;
    },
    enter(el) {
      el.style.width = `${this.percentage}%`
      el.style.transition = `width 1s linear`
      if(`${this.percentage}` <=30) {
        el.style.backgroundColor = `#F44336`
      }else if(`${this.percentage}` >=31 && `${this.percentage}` <=60) {
        el.style.backgroundColor = `#03A9F4`
      }else {
        el.style.backgroundColor = `#00E676`
      }
    },
  },
};
</script>
<style scoped>

.active label {
  color: #ff298a !important;
}
.active .tracker-bar {
  background: #ff298a !important;
}

.progress-bar {
  width: 100%;
  height: 20px;
}
.progress-bar label {
  color: #ffff;
}
.progress-bar .progress-container {
  font-size: 15px;
  justify-content: space-between;
  display: flex;
  text-transform: uppercase;
}
.progress-bar .info .percentage {
  font-weight: bolder;
}
.progress-bar .background-bar {
  background: #ccc;
  width: 100%;
  height: 28px;
}
.progress-bar .tracker-bar {
  height: 28px;
  width: 0;
  transition: width 0.5s linear;
}
</style>
