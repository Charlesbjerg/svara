<template>
	<div>
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
import TaskCard from "./task-card";
import BoardCard from "../entities/boards/BoardCard";
import ProjectCard from "../projects/ProjectCard";

export default {
	name: "ClientDashboard",
	components: {
		TaskCard,
		BoardCard,
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
		},
		name() {
			return this.user.name ?? 'User'
		}
	},
	async mounted() {
		const response = await this.$api('api/dashboard/staff');
		this.dashboard = response.data;
	}
}
</script>

<style scoped>

</style>
