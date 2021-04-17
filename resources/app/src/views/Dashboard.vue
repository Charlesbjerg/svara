<template>
    <div class="dashboard">
        <page-head :title="`Welcome back, ${ name }!`" />
		<client-dashboard v-if="user.typeId === 3" />
		<staff-dashboard v-else />
    </div>
</template>

<script>
import ProjectCard from "../components/projects/ProjectCard";
import PageHead from "../components/common/PageHead";
import BoardCard from "../components/entities/boards/BoardCard";
import TaskCard from "../components/dashboard/task-card";
import StaffDashboard from "../components/dashboard/StaffDashboard";
import ClientDashboard from "../components/dashboard/ClientDashboard";

export default {
    name: "Dashboard",
    components: {
		ClientDashboard,
		StaffDashboard,
        PageHead,
    },
    computed: {
        user() {
            return this.$store.state.auth.user;
        },
        name() {
            return this.user.name ?? 'User'
        }
    },
	mounted() {
    	console.log(this.$store.state.auth.user)
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
