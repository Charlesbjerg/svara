<template>
  <div class="nav">
    <div class="nav__logo">
      <img src="@/assets/logo.svg" alt="Svara Logo" />
    </div>
    <nav class="nav__links">
      <router-link to="/" class="nav__link">
        <i class="fas fa-home nav__link-icon"></i>
        Home
      </router-link>
      <router-link to="/login" class="nav__link">
        Login
      </router-link>
      <router-link to="/register" class="nav__link">
        Register
      </router-link>
      <router-link to="/dashboard" class="nav__link">
        Dashboard
      </router-link>
    </nav>
    <footer class="nav__profile">
        <!-- TODO: Add users image -->
<!--      <button @click="logout" class="nav__link">Logout</button>-->
    </footer>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Navigation.vue",
  methods: {
    logout() {
      axios.post('/api/logout')
          .then(res => {
            console.log(res);
          })
          .catch(err => {
            console.error("Logout failed", err);
          })
    }
  }
}
</script>

<style lang="scss" scoped>
.nav {
  height: 100%;
  padding: 30px 40px;
  @include box-shadow;
  &__logo {
    display: flex;
    justify-content: center;
    img {
      max-width: 200px;
    }
  }
  &__links {
    margin: 30px 0;
  }
  &__link {
    display: block;
    background-color: #fff;
    text-decoration: none;
    border: 0;
    padding: 10px 0;
    margin: 0;
    font-family: $font-heading;
    font-size: 18px;
    color: #000;
  }
  &__link-icon {
    margin-right: 10px;
  }
}
</style>