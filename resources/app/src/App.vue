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
import axios from 'axios';

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
    axios.get('sanctum/csrf-cookie');
    // Check Auth
    axios.get('/api/auth/user')
      .then(response => {
        // Update user in VueX store if needed
        console.log(response);
      })
      .catch(error => {
        // If 401, redirect to login page
        if (error.response.status === 401) {
          console.log("Not auth, need to login");
          this.$router.push('/login');
        } 
      });
  }
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
