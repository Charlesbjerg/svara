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
import { mapGetters } from 'vuex';

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
  computed: {
    ...mapGetters({
      getUser: 'auth/getUser',
    })
  },
  async mounted() {

    // Setup CSRF for App and check auth state
    await this.$api('sanctum/csrf-cookie', 'GET');
    const response = await this.$api('api/auth/user', 'GET')
    if (response.status === 'Error') {
      await this.$router.push('/login');
    } else {
      this.$store.commit('auth/setUser', response.data.user);
    }

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
