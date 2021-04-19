<template>
  <div :class="loaderClasses" >
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Loader",
  computed: {
    showLoader() {
      return this.$store.getters['util/getLoaderState'];
    },
    loaderClasses() {
      return this.showLoader ? 'loader loader--active' : 'loader';
    }
  }
}
</script>

<style lang="scss" scoped>
.loader {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
	z-index: 10000;
  background-color: rgba(0, 0, 0, 0.2);
  pointer-events: none;
  opacity: 0;
  @include transition-default;
  &--active {
    opacity: 1;
    pointer-events: all;
  }
}

.spinner {
  margin: 100px auto;
  width: 40px;
  height: 40px;
  position: relative;
  text-align: center;
  animation: sk-rotate 2.0s infinite linear;
}

.dot1, .dot2 {
  @include gradient-purple;
  width: 60%;
  height: 60%;
  display: inline-block;
  position: absolute;
  top: 0;
  border-radius: 100%;
  animation: sk-bounce 2.0s infinite ease-in-out;
}

.dot2 {
  //background-color: $accent-light;
  top: auto;
  bottom: 0;
  animation-delay: -1.0s;
}

@keyframes sk-rotate {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes sk-bounce {
  0%, 100% {
    transform: scale(0.0);
  }
  50% {
      transform: scale(1.0);
  }
}
</style>
