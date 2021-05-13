<template>
    <div class="clients-single" v-if="data">
        <page-head :title="data.client.name" subtitle=""/>
		<breadcrumbs :breadcrumbs="viewBreadcrumbs" v-if="viewBreadcrumbs.length > 0"/>
        <div class="client-top-info">
            <div v-if="data.client.mainContact !== null">
                <h3>Main Contact</h3>
				<staff-member-card :user="data.client.mainContact" />
            </div>
            <div>
                <h3>Account Manager</h3>
				<staff-member-card :user="data.client.accountManager" />
			</div>
            <div>
                <h3>Project Info</h3>
				<div class="info-card">
                	<p class="info-card__item">Total Projects: {{ data.projectCount }}</p>
				</div>
            </div>
        </div>
        <div class="client-info">
            <aside class="client-info__users">
                <h2>Client Users</h2>
                <staff-member-card v-if="data.client.members.length > 0"
								   v-for="(user, index) in data.client.members"
								   :key="index"
								   :user="user"
								   :mainUser="user.id === data.client.mainContactId" />
				<div class="client-info__users-none" v-else>
					<h3>This client currently has no user accounts setup.</h3>
				</div>
				<button class="btn btn-default" @click="newUserModal = true">
					Add Client User
					<i class="fas fa-user-plus"></i>
				</button>
            </aside>
            <section class="client-projects" v-if="data.client.projects.length > 0">
                <mini-project-card v-for="(project, index) in data.client.projects" :key="index" :project="project" :hideClient="true" />
            </section>
			<section class="client-no-projects" v-else>
				<h3>This client is yet to commission any projects.</h3>
			</section>
        </div>
		<action-modal v-if="newUserModal" title="Add Client User Account" @close="newUserModal = false">
			<add-client-user @update="updateUsers" :client="data.client" />
		</action-modal>
    </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import MiniProjectCard from "../../components/clients/MiniProjectCard";
import StaffMemberCard from "../../components/projects/wizard/StaffMemberCard";
import ActionModal from "../../components/company/ActionModal";
import AddClientUser from "../../components/clients/AddClientUser";
import Breadcrumbs from "../../components/common/Breadcrumbs";

export default {
    name: 'ClientsSingle',
    components: {
		Breadcrumbs,
		AddClientUser,
		ActionModal,
        StaffMemberCard,
        MiniProjectCard,
        PageHead
    },
    data() {
        return {
            data: null,
			newUserModal: false,
			viewBreadcrumbs: [],
        };
    },
    async mounted() {
        const response = await this.$api(`api/clients/${this.$route.params.id}`);
        this.data = response.data;
        this.viewBreadcrumbs = [
			{ name: 'Clients', href: '/clients' },
			{ name: this.data.client.name, active: true },
		];
    },
	methods: {
    	updateUsers(user) {
    		this.data.client.members.push(user);
    		this.newUserModal = false;
		}
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
	&__item {
		margin: 0 0 15px;
		&:last-child {
			margin: 0;
		}
	}
}
.client-info {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
    gap: 30px;
    &__users {
        background-color: $light-grey;
        padding: 20px;
        border-radius: $border-radius;
		button {
			margin-top: 20px;
		}
    }
	&__users .staff-card {
		margin-bottom: 15px;
	}
	&__users-none {
		height: 200px;
		display: flex;
		align-items: center;
		justify-content: center;
		opacity: 0.65;
		padding: 0 30px;
		text-align: center;
	}
}
.client-projects {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 30px;
}
.client-no-projects {
	display: flex;
	align-items: center;
	justify-content: center;
	height: 200px;
	text-align: center;
	opacity: 0.65;
}
</style>
