<template>
	<aside class="popup-notif" :class="typeClass" ref="notif">
		<div class="popup-notif__inner">
			<i :class="iconClass"></i>
			<p class="popup-notif__message">{{ message }}</p>
		</div>
	</aside>
</template>

<script>
export default {
	name: "Notification.vue",
	props: {
		message: {
			type: String,
			required: true,
		},
		type: {
			type: String,
			required: false,
			default: 'info',
		}
	},
	computed: {
		typeClass() {
			return `popup-notif--${this.type}`;
		}
	},
	mounted() {
		this.$nextTick(() => {
			setTimeout(() => {
				this.$refs.notif.classList.add('active');
			}, 250);
			this.autoClose();
		});
	},
	methods: {
		autoClose() {
			setTimeout(() => {
				this.$refs.notif.classList.remove('active');
				this.$store.commit('util/unsetGlobalNotif');
			}, 10000);
		}
	}
};
</script>

<style lang="scss">
.popup-notif {
	position: fixed;
	bottom: 30px;
	right: 30px;
	max-width: 450px;
	margin: 0 20px;
	width: 100%;
	padding: 20px;
	border-radius: $border-radius;
	transform: translate3d(100%, 0, 0);
	opacity: 0;
	@include box-shadow;
	@include gradient-purple;
	@include transition-bounce;
	&__inner {

	}
	&__icon {

	}
	&__message {
		color: #fff;
		font-family: $font-heading;
		margin: 0;
	}

	/* Modifiers */
	&.active {
		opacity: 1;
		transform: translate3d(0, 0, 0);
	}
	&--error {
		@include gradient-red;
	}

}
</style>
