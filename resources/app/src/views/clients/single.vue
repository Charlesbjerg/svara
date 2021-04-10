<template>
    <div class="clients-single" v-if="data">
        <page-head :title="data.client.name" subtitle=""/>
        <div class="client-top-info">
            <div class="info-card">
                <h3>Main Contact</h3>
                <p>{{ data.client.mainContact.name }}</p>
            </div>
            <div class="info-card">
                <h3>Account Manager</h3>
                <p>{{ data.client.accountManager.name }}</p>
            </div>
            <div class="info-card">
                <h3>Project Info</h3>
                <p>Total Projects: {{ data.projectCount }}</p>
            </div>
        </div>
        <div class="client-info">
            <aside class="client-info__users">
                <h2>Client Users</h2>
                <staff-member-card v-for="(user, index) in data.client.members" :key="index" :user="user" :mainUser="user.id === data.client.mainContactId" />
            </aside>
            <section class="client-projects">
                <mini-project-card v-for="(project, index) in data.client.projects" :key="index" :project="project" :hideClient="true" />
            </section>
        </div>
    </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import MiniProjectCard from "../../components/clients/MiniProjectCard";
import StaffMemberCard from "../../components/projects/wizard/StaffMemberCard";

export default {
    name: 'ClientsSingle',
    components: {
        StaffMemberCard,
        MiniProjectCard,
        PageHead
    },
    data() {
        return {
            data: null,
        };
    },
    async mounted() {
        const response = await this.$api(`api/clients/${this.$route.params.id}`);
        this.data = response.data;
    }
};
</script>

<style lang="scss">
.client-top-info {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 30px;
    padding: 20px;
    margin-bottom: 30px;
    border-radius: $border-radius;
    background-color: $light-grey;
}
.info-card {
    background-color: #fff;
    padding: 20px;
    border-radius: $border-radius;
    @include box-shadow-sm;
}
.client-info {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
    gap: 30px;
    &__users {
        background-color: $light-grey;
        padding: 20px;
        border-radius: $border-radius;
    }
}
.client-projects {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 30px;
}
</style>
