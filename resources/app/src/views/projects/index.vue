<template>
    <div class="projects-index">
        <page-head title="Ongoing Projects" :subtitle="pageSubtitle">A Graph Might go Here</page-head>
        <div v-if="hasProjects">
			<div class="filters">
				<filter-bar @update="filterProjects" @reset="resetProjects" />
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
import Breadcrumbs from "../../components/common/Breadcrumbs";

export default {
    name: "ProjectsIndex",
    components: {
		Breadcrumbs,
		FilterBar,
        ProjectCard,
        PageHead,
    },
	data() {
    	return {
    		filteredResults: [],
			filtersApplied: false,
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
        await this.fetchProjects();
    },
	methods: {
    	async fetchProjects() {
			this.$store.commit('util/enableLoader');
			const response = await this.$api('api/projects', 'GET');
			this.$store.commit('projects/setProjects', response.data);
			this.$store.commit('util/disableLoader');
		},
    	filterProjects(projects) {
    		this.filtersApplied = true;
			this.$store.commit('projects/setProjects', projects);
		},
		async resetProjects() {
			this.filtersApplied = false;
			await this.fetchProjects();
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
	@media (max-width: 1400px) {
		grid-template-columns: repeat(3, minmax(0, 1fr));
	}
	@media (max-width: 1200px) {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
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
		text-align: center;
	}
	@media (max-width: 1900px) {
		.btn {
			flex-basis: 250px;
			max-width: 250px;
		}
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
