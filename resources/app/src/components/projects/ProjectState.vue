<template>
	<div class="state" :class="stateClass" @click="toggleList">
		{{ state.state }}
		<div class="state-list" ref="list">
			<button v-for="state in stateList" :key="state.id" @click="select(state)" class="state-list__item">
				{{ state.state }}
				<i class="far fa-check-circle"></i>
			</button>
		</div>
	</div>
</template>

<script>
export default {
	name: "ProjectState",
	props: {
		projectId: {
			type: Number,
			required: true,
		},
		state: {
			type: Object,
			required: true,
		},
	},
	data() {
		return {
			stateList: [],
		};
	},
	computed: {
		stateClass() {
			return `state--${this.state.style}`;
		},
	},
	methods: {
		async toggleList() {
			if (this.stateList.length === 0) {
				const response = await this.$api('api/projects/state');
				this.stateList = response.data;
			}
			this.$refs.list.classList.toggle('active');
		},
		async select(state) {
			const response = await this.$api(`api/projects/state/${this.projectId}`, 'POST', { state_id: state.id });
			if (response.data.success) {
				this.$store.commit('projects/updateCurrentProjectState', state);
				this.$store.commit('util/setGlobalNotif', { message: 'Project state updated!', type: 'success', });
				this.closeList();
			} else {
				this.$store.commit('util/setGlobalNotif', { message: 'Project state failed to update, please try again later.', type: 'error', });
			}
		},
		closeList() {
			this.$refs.list.classList.remove('active');
		}
	}
};
</script>

<style lang="scss" scoped>
.state {
	padding: 10px 20px;
	border-radius: 10px;
	color: #fff;
	font-size: $font-base;
	position: relative;
	cursor: pointer;
	@include box-shadow-sm;
	@include transition-default;
	&:hover {
		@include box-shadow;
	}
	/* State label colours in @/scss/_ui.scss */
}
.state-list {
	opacity: 0;
	pointer-events: none;
	position: absolute;
	top: calc(100% + 15px);
	right: 0;
	z-index: 10;
	width: 500px;
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 10px;
	padding: 15px;
	background-color: #fff;
	border-radius: $border-radius;
	@include box-shadow-sm;
	@include transition-default;
	&.active {
		opacity: 1;
		pointer-events: all;
	}
	&__item {
		display: flex;
		align-items: center;
		justify-content: space-between;
		width: 100%;
		background-color: #fff;
		//margin: 0 0 10px;
		padding: 5px 10px;
		border-radius: $border-radius;
		border: 0;
		cursor: pointer;
		@include transition-default;
		i {
			opacity: 0;
			color: $accent-colour;
			@include transition-default;
		}
		&:hover {
			background-color: $light-grey;
		}
		&:hover i {
			opacity: 1;
		}
	}
}
</style>
