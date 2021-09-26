<template>
  <div class="text-center">
    <vue-text-transition
      :show="showText"
      name="test"
      tag="h1"
      :interval="40"
      :custom-class="[{ selector: ':nth-child(odd)', class: 'test_odd' }]"
    >
      Vamble Apartments & Suites
    </vue-text-transition>
  </div>
</template>

<script>
import VueTextTransition from "vue-text-transition";

export default {
  name: "BannerText",
  components: {
    VueTextTransition,
  },
  data() {
    return {
      showText: false,
    };
  },
  mounted() {
    setTimeout(() => {
      this.showText = true;
    }, 1900);
  },
};
</script>

<style lang="scss" scoped>
h2 {
  font-size: 3.1rem;
  color: white;
}
span {
  display: inline-block;
}

.v--vtt-test,
.v--vtt-test_odd {
  will-change: transform, opacity;
  transition: opacity 0.3s ease-in-out, transform 1s ease-in-out;
}

.v--vtt-test_visible,
.v--vtt-test_odd_visible {
  opacity: 1;
  transform: translateY(0);
}

.v--vtt-test_hidden {
  opacity: 0;
  transform: translateY(20px);
}

.v--vtt-test_odd_hidden {
  opacity: 0;
  transform: translateY(-20px);
}
</style>
