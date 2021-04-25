<template>
	<div class="client-dashboard">
		<div class="client-dashboard__threads panel">
			<h2>Messages</h2>
			<div class="message-card" v-for="(message, index) in dashboard.messages" :key="index">
				<router-link :to="`/projects/${message.project_id}?panel=messages`" class="message-card__inner">
					<div class="message-card__content">
						<strong class="message-card__title">{{ message.title }}</strong>
						<p class="message-card__project">{{ message.name }}</p>
						<em class="message-card__date">Last updated: {{ $dateFormatter(message.updated_at) }}</em>
					</div>
					<span class="message-card__count">
						{{ message.messageCount }}
						<i class="far fa-comments ml-5"></i>
					</span>
				</router-link>
			</div>
		</div>
		<section class="dashboard__section" v-if="dashboard.hasOwnProperty('projects') && dashboard.projects.length > 0">
			<h2>Ongoing Projects</h2>
			<div class="card-grid">
				<project-card v-for="(project, index) in dashboard.projects" :key="index" :project="project"/>
			</div>
		</section>
	</div>
</template>

<script>
import TaskCard from "./task-card";
import BoardCard from "../entities/boards/BoardCard";
import ProjectCard from "../projects/ProjectCard";

export default {
	name: "StaffDashboard",
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
		const response = await this.$api('api/dashboard/client');
		this.dashboard = response.data;
		console.log(response.data);
	}
}
</script>

<style lang="scss">
.client-dashboard {
	display: grid;
	grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
	gap: 30px;
}
.message-card {
	padding: 20px;
	background-color: #fff;
	border-radius: $border-radius;
	@include box-shadow-sm;
	&__inner {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	&__count {
		flex-basis: 75px;
		max-width: 75px;
		margin-left: 10px;
		display: block;
		border-radius: $border-radius;
		padding: 10px;
		color: #fff;
		font-family: $font-heading;
		font-size: $font-sm;
		text-align: center;
		@include gradient-purple;
	}
	&__content {
		flex: 1;
	}
	&__title {
		display: block;
		margin: 0 0 5px;
		font-family: $font-heading;
		font-size: $font-sm;
	}
	&__project {
		margin: 0 0 15px;
		font-family: $font-heading;
		font-weight: $font-weight-heading;

	}
}
</style>
