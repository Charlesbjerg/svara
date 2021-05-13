<template>
    <section class="project-staff">
        <header class="project-staff__head">
            <h2 class="project-staff__title">Project Staff</h2>
            <button @click="viewOptions" class="project-staff__options">
				<i class="fas fa-ellipsis-v"></i>
			</button>
        </header>
        <div class="project-staff__members" v-if="project.staff">
            <project-staff-member v-for="(member, index) in condensedStaffList" :key="index" :member="member"  />
			<div class="project-staff__other" v-if="project.staff.length > 5">
				{{ extraStaffCount }} other users are involved with this project
			</div>
        </div>
    </section>
</template>

<script>
import ProjectStaffMember from "./ProjectStaffMember";
import { createNamespacedHelpers } from 'vuex';
const { mapState } = createNamespacedHelpers('projects');

export default {
    name: "ProjectStaff",
    components: {
        ProjectStaffMember,
    },
    data() {
        return {};
    },
    computed: {
        ...mapState({
            project: state => state.currentProject,
        }),
        condensedStaffList() {
            return this.project.staff.slice(0, 5);
        },
		extraStaffCount() {
        	return this.project.staff.length - 5;
		}
    },
    methods: {
        viewOptions() {},
    },
    // Fetch staff members for a project
    async mounted() {
        const response = await this.$api(`/api/projects/${this.project.id}/staff`);
        this.members = response.data.staff;
    }
}
</script>

<style lang="scss" scoped>
.project-staff {
    background-color: $background-grey;
    color: #fff;
    padding: 30px;
    @include box-shadow;
    &__head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    &__title {
        font-size: $font-md;
        font-family: $font-heading;
        font-weight: $font-weight-heading;
    }
    &__options {
        border: 0;
        background-color: #fff;
        color: #000;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
        @include transition-default;
        &:hover {
            background-color: darken(#fff, 25%);
        }
    }
	&__other {
		font-family: $font-heading;
		font-weight: $font-weight-heading;
		font-size: $font-sm;
		font-style: italic;
		margin: 30px 0 0;
		display: block;
	}
}
</style>
