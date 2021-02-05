<template>
  <aside class="popup-notif">
    <div class="popup-notif__inner">
      <i :class="iconClass"></i>
      <p class="popup-notif__message">{{ message }}</p>
    </div>
  </aside>
</template>

<script>
import { mapMutations } from 'vuex';

export default {
  name: "Notification.vue",
  computed: {
    iconClass() {
      return this.$store.state['util/globalNotifType'];
    },
    message() {
      return this.$store.state['util/globalNotifMessage'];
    },
    ...mapMutations({
      setNotification: 'util/setGlobalNotif',
    }),
  }
}
</script>

<style scoped>

</style>
