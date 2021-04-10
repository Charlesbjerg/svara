<template>
    <div class="dashboard">
        <page-head :title="`Welcome back, ${ user.name }!`" />
        <section class="dashboard__section" v-if="dashboard.hasOwnProperty('projects') && dashboard.projects.length > 0">
            <h2>Ongoing Projects</h2>
            <div class="card-grid">
                <project-card v-for="(project, index) in dashboard.projects" :key="index" :project="project"/>
            </div>
        </section>
        <div class="dashboard__section--split">
            <div class="info-area">
                <div class="info-card" v-for="(info, index) in dashboard.info" :key="index">
                    <h3>{{ info.key }}</h3>
                    <p>{{ info.value }}</p>
                </div>
            </div>
            <section v-if="dashboard.hasOwnProperty('cards') && dashboard.cards.length > 0">
                <h2>Outstanding Tasks</h2>
                <div class="card-grid">
                    <task-card v-for="(card, index) in dashboard.cards" :key="index" :task="card"/>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import ProjectCard from "../components/projects/ProjectCard";
import PageHead from "../components/common/PageHead";
import BoardCard from "../components/entities/boards/BoardCard";
import TaskCard from "../components/dashboard/task-card";

export default {
    name: "Dashboard",
    components: {
        TaskCard,
        BoardCard,
        PageHead,
        ProjectCard,
    },
    data() {
        return {
            dashboard: {},
        };
    },
    computed: {
        user() {
            return this.$store.state.auth.user;
        }
    },
    async mounted() {
        const response = await this.$api('api/dashboard');
        this.dashboard = response.data;
    }
};
</script>

<style lang="scss">
.dashboard {
    &__section {
        margin-bottom: 45px;
    }
    &__section--split {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
        gap: 20px;
    }
}
.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}
.info-area {
    padding: 30px;
    border-radius: $border-radius;
    background-color: $light-grey;
}
.info-card {
    padding: 20px;
    border-radius: $border-radius;
    background-color: #fff;
    margin-bottom: 30px;
    @include box-shadow-sm;
    &:last-child {
        margin-bottom: 0;
    }
}
</style>
