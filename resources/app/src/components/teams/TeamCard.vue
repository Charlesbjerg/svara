<template>
	<div class="team-card">
		<input type="text" class="team-card__input" v-model="team.name" v-if="edit" @blur.native="updateTeam" />
		<h3 class="team-card__name" v-else @click="edit = true">{{ team.name }}</h3>
		<p class="team-card__total">{{ team.members.length }} members in team</p>
	</div>
</template>

<script>
export default {
	name: "TeamCard",
	emits: ['updated'],
	props: {
		team: {
			required: true,
			type: Object,
		},
	},
	data() {
		return {
			edit: false,
		}
	},
	mounted() {
		this.$nextTick(() => {
			if (this.team.id === null) {
				this.edit = true;
			}
		});
	},
	methods: {
		async updateTeam() {
			let response;
			if (this.team.id === null) {
				response = await this.$api('api/teams', 'POST', {
					name: this.team.name
				});
			} else {
				response = await this.$api('api/teams', 'PUT', {
					name: this.team.name
				});
			}
			this.$emit('updated', response.data.teams);
		}
	}
}
</script>

<style lang="scss">
.team-card {
	padding: 20px;
	border-radius: $border-radius;
	background-color: #fff;
	margin-bottom: 15px;
	border: 2px solid transparent;
	cursor: pointer;
	@include box-shadow-sm;
	@include transition-default;
	&:hover {
		background-color: darken($light-grey, 10%);
	}
	&__name {
		@include title($font-sm);
	}
	&__input {
		font-family: $font-heading;
		padding: 5px 10px;
		margin-bottom: 10px;
	}
	&__total {
		margin: 0;
	}
	&--active {
		border-color: $accent-colour;
	}
}
</style>
