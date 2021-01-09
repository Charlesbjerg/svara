<template>
  <div class="app">
    <Navigation />
    <main>
      <router-view />
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
</style>
