<template>
    <div class="add-user">
        <p>The new user will be sent an email to finish setting up this account. The account will automatically be attached to this company.</p>
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
        <div class="form-item">
            <label for="type">User Type</label>
            <select id="type" v-model="type">
                <option disabled selected>Select a type</option>
                <option v-for="(type, index) in types" :key="index" :value="type.id">{{ type.type }}</option>
            </select>
        </div>
        <div class="form-item">
            <label for="team">Team</label>
            <select id="team" v-model="team">
                <option disabled selected>Select a team</option>
                <option v-for="(team, index) in teams" :key="index" :value="team.id">{{ team.name }}</option>
            </select>
        </div>
        <button class="btn btn-default" @click="submit">Create User</button>
    </div>
</template>

<script>
export default {
    name: "AddUser",
    data() {
        return {
            name: '',
            jobRole: '',
            email: '',
            type:  null,
            team: null,
            types: [],
            teams: [],
        }
    },
    async mounted() {
        const response = await this.$api('api/users/setup-data');
        this.types = response.data.types;
        this.teams = response.data.teams;
    },
    methods: {
        async submit() {
            const response = await this.$api('api/auth/register', 'POST', {
                name: this.name,
                jobRole: this.jobRole,
                email: this.email,
                type: this.type,
                team: this.team,
            });
            this.$emit('close');
			this.$store.commit('util/setGlobalNotif', { message: 'New user has been added!', type: 'success' });
		}
    }
}
</script>

<style scoped>

</style>
