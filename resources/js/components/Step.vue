<template>
  <div>
    <div
      class="
        top-bar
        bg-white
        rounded-pill
        mb-3
        position-relative
        overflow-hidden
      "
    >
      <span
        class="bg-primary position-absolute bar-body"
        :style="{ width: `${(100 / 3) * step}%` }"
      ></span>
    </div>
    <div class="step mb-3">
      <div
        :class="step >= 1 ? 'active' : ''"
        class="d-flex align-items-center justify-content-center stepper-right"
        @click="toggleStep(1)"
      >
        <span class="badge badge-pill badge-light mr-1">1</span>
        <span class="step-title"> Reservation</span>
      </div>
      <div
        :class="step >= 2 ? 'active' : 'disabled'"
        class="d-flex align-items-center justify-content-center stepper"
        @click="toggleStep(2)"
      >
        <span class="badge badge-pill badge-light mr-1">2</span>
        <span class="step-title">Guest Details </span>
      </div>
      <div
        :class="step === 3 ? 'active' : ''"
        class="d-flex align-items-center justify-content-center stepper-left"
        @click="toggleStep(3)"
      >
        <span class="badge badge-pill badge-light mr-1">3</span>
        <span class="step-title"> Finish Up</span>
      </div>
    </div>
    <div class="body-step">
      <slot name="one" v-if="step === 1"> </slot>
      <slot name="two" v-if="step === 2"> </slot>
      <slot name="three" v-if="step === 3"> </slot>
    </div>
  </div>
</template>
<script>
export default {
  props: ["step"],
  methods: {
    toggleStep(val) {
      this.$emit("toggleStep", val);
    },
  },
};
</script>
<style scoped lang="scss">
.top-bar {
  height: 10px;
}
.bar-body {
  height: 100%;
  z-index: 1;
}
.body-step {
  border-radius: 2px;
  background: white;
  padding: 1rem;
  @media (max-width: 768px) {
    padding: 0.5rem;
  }
}
.step-title {
  font-size: 0.9rem;
  @media (max-width: 768px) {
    font-size: 0.6rem;
  }
}
.step {
  display: flex;
  justify-content: space-between;
  align-items: center;
  div {
    width: calc(100% / 3);
    text-align: center;

    padding: 0.6rem 0.8rem;
    position: relative;
    overflow: hidden;
    background: hsl(40deg 73% 89%);
    @media (max-width: 768px) {
      padding: 0.3rem 0.4rem;
    }
     &.active {
      background: var(--primary);
      color: #fff;
    }
     &.stepper::after, &.stepper-right::after {
      content: "";
      width: 34px;
      height: 34px;
      background: #f8fafc;
      position: absolute;
      right: -17px;
    //  top: 0;
      transform: rotate(45deg);
      @media (max-width: 768px) {
        width: 25px;
        right: -16px;
      }
    }
    &.stepper::before, &.stepper-left::after {
      content: "";
      width: 34px;
      height: 34px;
      background: #f8fafc;
      position: absolute;
      left: -17px;
      //top: 0;
      transform: rotate(45deg);
      @media (max-width: 768px) {
        width: 25px;
        left: -16px;
      }
    }
  }
}
</style>