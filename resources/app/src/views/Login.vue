<template>
  <div class="form-card-outer">
    <form @submit="login" class="form-card">
      <h1>Login</h1>
      <div class="form-error" v-if="this.errorMessage !== ''" ref="errors">
        <p>{{ this.errorMessage }}</p>
      </div>
      <div class="form-item">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" ref="email" required>
      </div>
      <div class="form-item">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" ref="password" required>
      </div>
      <div class="form-item form-item--checkbox">
        <label for="remember">
          <input type="checkbox" name="remember" id="remember" ref="remember">
          Remember me after login
        </label>
      </div>
      <button class="btn btn-default btn-block">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      errorMessage: '',
    };
  },
  methods: {
    async login(e) {
        e.preventDefault();

        // Attempt user login
        const response = await this.$api('api/auth/login', 'POST', {
          email: this.$refs.email.value,
          password: this.$refs.password.value,
        });

        // If 200 redirect home, otherwise show errors
        if (response.status === 'Error') {
          const errors = Object.keys(response.data.errors);
          errors.forEach(elem => {
            this.$refs[elem].parentNode.classList.add('form-item--error');
          })
          this.showError(response.message);
        } else {
          this.$store.commit('auth/setUser', response.data.user);
          this.$router.push('/dashboard');
        }

    },
    showError(message) {

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
  padding: 20px;
  width: 400px;
  @include box-shadow;
  h1 {
    text-align: center;
  }
}
</style>
