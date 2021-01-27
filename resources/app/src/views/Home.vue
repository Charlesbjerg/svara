<template>
  <div class="home">
    Homepage
  </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import HelloWorld from "@/components/HelloWorld.vue";

@Options({
  components: {
    HelloWorld
  },
})
export default class Home extends Vue {
  mounted() {
    this.$http.get('/api/user').then(res => console.log(res));
  }
}
</script>
