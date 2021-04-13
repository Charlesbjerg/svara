<template>
	<div class="client-user">
		<p>Add a user account for this particular client. This gives them access to their client information and projects within Svara.</p>
		<div class="form-item">
			<label for="name">Full Name</label>
			<input type="text" id="name" v-model="name" placeholder="Full Name" autocomplete="off" />
		</div>
		<div class="form-item">
			<label for="jobRole">Job Role</label>
			<input type="text" id="jobRole" v-model="jobRole" placeholder="Graphic Designer" autocomplete="off" />
		</div>
		<div class="form-item">
			<label for="email">Email Address</label>
			<input type="email" id="email" v-model="email" placeholder="dev@svara.io" autocomplete="off" />
		</div>
		<p>An email will be sent to the client user asking them to activate their account. They will then set their password and be able to use Svara.</p>
		<button class="btn btn-default" @click="submit">
			Add Client User
			<i class="far fa-plus-square"></i>
		</button>
	</div>
</template>

<script>
export default {
	name: "AddClientUser",
	props: {
		client: {
			type: Object,
			required: true,
		}
	},
	data() {
		return {
			name: '',
			jobRole: '',
			email: '',
			type: 3,	// User type ID for client
			team: null, // Must be null as client users cannot belong to teams
		}
	},
	methods: {
		async submit() {
			const response = await this.$api('api/auth/register', 'POST', {
				name: this.name,
				jobRole: this.jobRole,
				email: this.email,
				type: this.type,
				clientId: this.client.id,
			});
			if (response.data.success) {
				this.$emit('update', response.data.data);
				this.$emit('close');
			} else {
				console.log('Issue adding user');
			}
		}
	}
}
</script>

<style scoped>

</style>
