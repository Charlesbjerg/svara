<template>
    <section class="po-mini">
        <h2 class="po-mini__title">Points of Contact</h2>
		<project-staff-member :member="accountManager" :alt="true" />
		<em class="po-mini__subtitle">Account Manager</em>
		<project-staff-member :member="clientMainContact" :alt="true" />
    	<em class="po-mini__subtitle">Client Main Contact</em>
	</section>
</template>

<script>
import StaffMemberCard from "../wizard/StaffMemberCard";
import ProjectStaffMember from "./ProjectStaffMember";
export default {
    name: "ProjectOverviewMini",
	components: {
		ProjectStaffMember,
    	StaffMemberCard
    },
	computed: {
    	accountManager() {
    		return this.$store.state.projects.currentProject.client.accountManager;
		},
		clientMainContact() {
			return this.$store.state.projects.currentProject.client.mainContact;
		}
	}
}
</script>

<style lang="scss" scoped>
.po-mini {
    background-color: $background-grey;
    color: #fff;
    padding: 30px;
    @include box-shadow;
    &__title {
        font-weight: $font-weight-heading;
        font-size: $font-md;
        font-family: $font-heading;
        display: block;
    }
	&__subtitle {
		margin: 5px 0 15px;
		display: block;
		&:last-child {
			margin: 5px 0 0;
		}
	}
    &__item {
        margin: 0 0 5px;
    }
}
</style>
