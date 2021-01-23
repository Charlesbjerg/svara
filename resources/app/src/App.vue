<template>
  <div class="app">
    <Navigation />
    <main>
        <router-view class="view" v-slot="slotProps">
          <transition name="slide-fade">
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
};
</script>

<style lang="scss">
.app {
  display: grid;
  grid-template-columns: 300px auto;
  gap: 30px;
  height: 100vh;
  overflow: hidden;
}
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to{
  transform: translateX(10px);
  opacity: 0;
}
</style>
