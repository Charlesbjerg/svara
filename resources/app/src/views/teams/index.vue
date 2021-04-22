<template>
  <div class="teams-index">
    <page-head title="Teams" />
  	<div class="teams-grid">
		<aside class="teams-grid__teams panel">
			<h2>Company Teams</h2>
			<ul class="teams-grid__list">
				<li v-for="team in teams" :key="team.id" >
					<team-card :team="team" @click="selectTeam(team, $event)" @updated="updateTeams" />
				</li>
			</ul>
			<button class="btn btn-default team-users-grid__add" @click="addBlankTeam">
				Add Team
				<i class="fas fa-users"></i>
			</button>
		</aside>
		<section class="panel">
			<div v-if="selected">
				<h2>Users in {{ selectedTeam.name }}</h2>
				<div class="team-users-grid">
					<staff-member-card v-for="(member, index) in selectedTeam.members"
									   :key="index"
									   :user="member"
									   :deletable="true"
									   :main-user="false"
									   @deleted="removeUser(member.id, selected)" />
				</div>
				<button class="btn btn-default team-users-grid__add" @click="addUser">
					Add User
					<i class="fas fa-user-plus"></i>
				</button>
			</div>
			<div class="teams-grid__none" v-else>
				<h2>Select a team from the sidebar to view their users.</h2>
			</div>
		</section>
	</div>
	  <action-modal v-if="addUserModal" :active="addUserModal" title="Add User to Team">
		  <add-user-to-team :teamId="this.selected" @updated="updateTeams" @close="closeModal" />
	  </action-modal>
  </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import ProjectStaffMember from "../../components/projects/overview/ProjectStaffMember";
import StaffMemberCard from "../../components/projects/wizard/StaffMemberCard";
import ActionModal from "../../components/company/ActionModal";
import AddUserToTeam from "../../components/teams/AddUserToTeam";
import TeamCard from "../../components/teams/TeamCard";

export default {
  name: "index",
	components: {
		AddUserToTeam,
		ActionModal,
		StaffMemberCard,
  		ProjectStaffMember,
		PageHead,
		TeamCard
	},
	data() {
		return {
			teams: [],
			selected: null,
			addUserModal: false,
		};
	},
	computed: {
  		selectedTeam() {
  			return this.teams.find(team => team.id === this.selected);
		}
	},
	async mounted() {
  		const response = await this.$api('api/teams');
  		this.teams = response.data;
	},
	methods: {
  		selectTeam(team, event) {
  			this.selected = team.id;
		},
		async removeUser(id, teamId) {
  			const response = await this.$api(`api/teams/${teamId}/user/${id}`, 'DELETE');
  			if (response.data.success) {
  				this.teams = response.data.teams;
			}
		},
		addBlankTeam() {
			this.teams.push({ id: null, name: 'New Team', members: [] });
		},
		updateTeams(teams) {
  			this.teams = teams;
		},
		addUser() {
  			console.log('open modal');
  			this.addUserModal = true;
		},
		closeModal() {
  			this.addUserModal = false;
		}
	}
}
</script>

<style lang="scss">
.teams-grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
	gap: 30px;
	&__list {
		list-style-type: none;
		padding: 0;
		margin: 0 0 20px;
		> li {
			margin-bottom: 20px;
		}
	}
	&__none {
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		color: rgba($font-color, 0.75);
	}
}
.team-users-grid {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 20px;
	margin-bottom: 20px;
	&__add i {
		margin-left: 5px;
	}
}
</style>
