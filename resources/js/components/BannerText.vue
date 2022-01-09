<template>
  <div id="banner">
    <vue-text-transition
      :show="showText"
      name="test"
      tag="h1"
      :interval="35"
      :custom-class="[
        { selector: ':nth-child(odd)', class: 'test_odd vamble banner_fancy' },
      ]"
      >VAMBLE</vue-text-transition
    >
    <vue-text-transition
      :show="showText"
      name="test"
      tag="h2"
      :interval="20"
      :custom-class="[{ selector: ':nth-child(odd)', class: 'test_odd banner_fancy' }]"
    >
      Apartments & Suites</vue-text-transition
    >
    <p class="text-white banner_fancy" style="z-index: 2">A home away from home</p>
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
      showTitle: false,
      showText: false,
    };
  },
  mounted() {
    setTimeout(() => {
      this.showText = true;
    }, 1200);
  },
};
</script>

<style scoped>


#banner {
  font-family: "Nunito", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
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
p{
  font-family: 'The Nautigal', cursive;
}
</style>
