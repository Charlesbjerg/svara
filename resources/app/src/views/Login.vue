<template>
  <div class="form">
    <form @submit="login">
      <div class="form-item">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" ref="email">
      </div>
      <div class="form-item">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" ref="password">
      </div>
      <button>Login</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Login",
  methods: {
    login(e) {
        e.preventDefault();
        axios.post('/api/login', {
          email: this.$refs.email.value,
          password: this.$refs.password.value,
        })
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.error("Login Failed!", err);
        });
        console.log(e);
    }
  }
};
</script>

<style scoped></style>
