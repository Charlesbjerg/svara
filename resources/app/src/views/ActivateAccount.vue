<template>
    <div>
        <page-head title="Activate a New Account" />
        TODO: Display activate account fields, and fetch necessary data in mounted
        <div v-if="user">
            Activating account for: {{ user.name }} - {{ user.job_role }}
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" v-model="password" id="password" />
            </div>
            <div class="form-item">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" v-model="confirmPassword" id="confirmPassword" />
            </div>
        </div>
        <button class="btn btn-default" @click="activate">Activate Account</button>
    </div>
</template>

<script>
import PageHead from "../components/common/PageHead";
export default {
    name: "ActivateAccount.vue",
    components: {PageHead},
    data() {
        return {
            user: null,
            password: '',
            confirmPassword: '',
        };
    },
    async mounted() {
        const response = await this.$api(`api/auth/activate/${this.$route.params.key}`);
        this.user = response.data;
    },
    methods: {
        async activate() {
            const response = await this.$api(`api/auth/activate/${this.$route.params.key}`, 'POST', {
                password: this.password,
                confirmPassword: this.confirmPassword,
            });
            if (response.status !== 'Error') {
                await this.$router.push('/dashboard');
            }
        }
    }
}
</script>

<style scoped>

</style>
