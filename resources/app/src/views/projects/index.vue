<template>
    <div class="projects-index">
        <PageHead title="Ongoing Projects" :subtitle="pageSubtitle">A Graph Might go Here</PageHead>
        <div class="filters">
            Project Filters to appear here
            <router-link to="/projects/create" class="btn btn-default">Create New Project</router-link>
        </div>
        <section class="grid">
            <ProjectCard v-for="(project, index) in projects" :key="index" :project="project"/>
        </section>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import ProjectCard from "@/components/projects/ProjectCard";
import PageHead from "@/components/common/PageHead";

export default {
    name: "ProjectsIndex",
    components: {
        ProjectCard,
        PageHead,
    },
    computed: {
        ...mapGetters({
            projects: 'projects/getAllProjects',
        }),
        pageSubtitle() {
            return `There are currently ${this.projects.length} in the pipeline`;
        }
    },
    async mounted() {
        this.$store.commit('util/enableLoader');
        const response = await this.$api('api/projects', 'GET');
        this.$store.commit('projects/setProjects', response.data);
        this.$store.commit('util/disableLoader');
    }
};
</script>

<style lang="scss">
.grid {
    display: grid;
    //grid-template-columns: repeat(4, minmax(0, 1fr));
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    @include custom-scrollbar;
}
.filters {
    width: 100%;
    margin-bottom: 2rem;
}
</style>
