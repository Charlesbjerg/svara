<template>
	<div class="app">
		<Navigation v-if="appLoaded"/>
		<div v-else>
			<div></div>
		</div>
		<main class="app-view" :class="isLoginView">
			<router-view class="view" v-slot="slotProps">
				<transition name="custom-transition"
							enter-active-class="animate__animated animate__fadeInLeft"
							leave-active-class="animate__animated animate__fadeOutLeft"
							mode="out-in">
					<component :is="slotProps.Component"></component>
				</transition>
			</router-view>
			<Notification v-if="notification" :message="notification" :type="type"/>
			<Loader/>
		</main>
	</div>
</template>

<script>
import Navigation from "@/components/common/Navigation";
import Notification from "@/components/common/Notification";
import Loader from "@/components/common/Loader";
import {mapGetters, mapMutations} from 'vuex';

export default {
	name: "App",
	components: {
		Navigation,
		Notification,
		Loader
	},
	data() {
		return {
			token: '',
			transitionName: '',
			appLoaded: false,
		};
	},
	computed: {
		...mapGetters({
			notification: 'util/getNotification',
			type: 'util/getNotificationType',
			isAuth: 'auth/isUserAuthenticated'
		}),
		isLoginView() {
			return this.$route.name === 'login' ? 'app-view--login' : '';
		}
	},
	async mounted() {

		// Setup CSRF for App and check auth state
		window.csrfCookie = await this.$api('sanctum/csrf-cookie', 'GET');
		const response = await this.$api('api/auth/user', 'GET')
		if (response.status === 'Error') {
			await this.$router.push('/login');
		} else {
			this.$store.commit('auth/setUser', response.data.user);
		}
		this.appLoaded = true;

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
	position: relative;
	grid-column: 2;
	&--login {
		grid-column: span 2;
	}
}
</style>
