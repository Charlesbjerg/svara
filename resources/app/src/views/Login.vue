<template>
  <div class="form-card-outer">
    <form @submit="login" class="form-card">
      <h1>Login</h1>
      <div class="form-item">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" ref="email">
      </div>
      <div class="form-item">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" ref="password">
      </div>
      <button class="btn btn-default">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "Login",
  methods: {
    login(e) {
        e.preventDefault();
        this.$http.post('http://app.svara.io/api/login',
        {
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

<style lang="scss">
.form-card-outer {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
.form-card {
  border-radius: $border-radius;
  @include box-shadow;
  padding: 20px;
}
</style>
