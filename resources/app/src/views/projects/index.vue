<template>
    <div class="projects-index">
        <PageHead title="Ongoing Projects" :subtitle="pageSubtitle">A Graph Might go Here</PageHead>
        <div v-if="hasProjects">
			<div class="filters">
				<filter-bar @update="filterProjects" />
				<router-link to="/projects/create" class="btn btn-default">Create New Project</router-link>
			</div>
			<section class="grid">
				<project-card v-for="(project, index) in projects" :key="index" :project="project"/>
			</section>
		</div>
		<section v-else class="no-projects">
			<h2 class="no-projects__title">No projects have been setup!</h2>
			<p class="no-projects__message">Create your first now!</p>
			<router-link to="/projects/create" class="btn btn-default">Create a Project</router-link>
		</section>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import ProjectCard from "@/components/projects/ProjectCard";
import PageHead from "@/components/common/PageHead";
import FilterBar from "../../components/projects/FilterBar";

export default {
    name: "ProjectsIndex",
    components: {
		FilterBar,
        ProjectCard,
        PageHead,
    },
	data() {
    	return {
    		filteredResults: [],
		}
	},
    computed: {
        ...mapGetters({
            projects: 'projects/getAllProjects',
        }),
        pageSubtitle() {
            return `There are currently ${this.projects.length} in the pipeline`;
        },
		hasProjects() {
        	return this.projects.length > 0;
		}
    },
    async mounted() {
        this.$store.commit('util/enableLoader');
        const response = await this.$api('api/projects', 'GET');
        this.$store.commit('projects/setProjects', response.data);
        this.$store.commit('util/disableLoader');
    },
	methods: {
    	filterProjects(projects) {
			this.$store.commit('projects/setProjects', projects);
		}
	}
};
</script>

<style lang="scss" scoped>
.grid {
    display: grid;
		grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    @include custom-scrollbar;
}
.filters {
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
	.btn {
		flex-basis: 220px;
		max-width: 220px;
		margin-left: 30px;
	}
}
.no-projects {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	min-height: 350px;
	&__title,
	&__message {
		opacity: 0.8;
		margin: 0 0 15px;
	}
}
</style>
