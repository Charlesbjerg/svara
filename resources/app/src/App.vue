<template>
  <div class="app">
    <Navigation />
    <main class="app-view">
        <router-view class="view" v-slot="slotProps">
          <transition name="custom-transition"
                      enter-active-class="animate__animated animate__fadeInLeft"
                      leave-active-class="animate__animated animate__fadeOutLeft"
                      mode="out-in">
            <component :is="slotProps.Component"></component>
          </transition>
        </router-view>
    </main>
  </div>
</template>

<script>
import Navigation from "@/components/common/Navigation";

export default {
  name: "App",
  components: {
    Navigation,
  },
  data() {
    return {
      token: '',
      transitionName: ''
    };
  },
  mounted() {
    // Setup CSRF for App
    this.$http.get('sanctum/csrf-cookie');
    // Check Auth
  },
};
</script>

<style lang="scss">
.app {
  display: grid;
  grid-template-columns: 300px auto;
  height: 100vh;
  overflow: hidden;
}
.app-view {
  padding: 0 30px;
  overflow-x: auto;
}
</style>
