<template>
    <div>
        <page-head title="Activate a New Account" />
        TODO: Display activate account fields, and fetch necessary data in mounted
        <div v-if="user">
            Activating account for: {{ user.name }} - {{ user.job_role }}
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
            user: null
        };
    },
    async mounted() {
        const response = await this.$api(`api/auth/activate/${this.$route.params.key}`);
        this.user = response.data;
        console.log(this.user);
    },
    methods: {
        activate() {
            // TODO: Send API request to activate account.
        }
    }
}
</script>

<style scoped>

</style>
