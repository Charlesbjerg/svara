<template>
	<div class="team-add-user">
		<p>Find a user to add to the team. They must not currently belong to a team, as users can only belong to a single team.</p>
		<div class="form-item">
			<label for="user">Find User (By Name)</label>
			<input type="text" name="user" id="user" @keyup="findUser" autocomplete="off" />
			<div class="search-results" v-if="userResults.length !== 0">
				<article class="search-results__result" v-for="user in userResults" :key="user.id"
						 @click="selectUser(user)">
					<span class="search-results__name">{{ user.name }}</span>
					<i class="far fa-check-circle"></i>
				</article>
			</div>
		</div>
		<staff-member-card v-if="user" :user="user" />
		<button class="btn btn-default" @click="confirmUser">Add User to Team</button>
	</div>
</template>

<script>
import StaffMemberCard from "../projects/wizard/StaffMemberCard";

export default {
	name: "AddUserToTeam",
	components: {StaffMemberCard},
	emits: ['close', 'updated'],
	props: {
		teamId: {
			required: true,
			type: Number,
		},
	},
	data() {
		return {
			userResults: [],
			user: null
		}
	},
	mounted() {
		// this.$nextTick(() => {
		// 	console.log(this.teamId);
		// });
	},
	methods: {
		async findUser(e) {
			const searchTerm = e.target.value;
			const response = await this.$api('api/teams/find-user', 'GET', { name: searchTerm });
			this.userResults = response.data;
		},
		selectUser(user) {
			this.user = user;
			this.userResults = [];
		},
		async confirmUser() {
			const response = await this.$api(`api/teams/${this.teamId}/user/${this.user.id}`, 'POST');
			if (response.data.success) {
				this.$emit('updated', response.data.teams);
				this.$emit('close');
			}
		}
	}
}
</script>

<style lang="scss">
.team-add-user button {
	margin-top: 20px;
}
</style>
