<template>
    <section class="confirm-project">

        <pre v-if="debug">{{ project }}</pre>

        <header class="confirm-project__head">
            <h2>Confirm New Project</h2>
            <em>Confirm the data for the new project is correct.</em>
        </header>

        <div class="confirm-panel-inner">

            <!-- TODO: Display essential Data -->
            <section class="confirm-section">
                <h3>{{ project.name }}</h3>
                <p>{{ project.team }}</p>
            </section>

            <!-- TODO: Display all staff added to the project -->
            <section class="confirm-section">
                <h3>Project Staff</h3>
                <div class="confirm-staff">
                    <staff-member-card v-for="user in project.staff" :key="user.id" :user="user"
                                       :deletable="false"/>
                </div>
            </section>

            <!-- TODO: Make sure the project lead is highlighted -->

            <!-- TODO: Show pipeline outline -->
            <section class="confirm-section">
                <h3>Project Pipeline</h3>
                <pipeline-phase-card v-for="(section, index) in project.pipeline" :key="index" :section="section"
                                     :index="index"/>
            </section>

        </div>

        <!-- TODO: Click confirm button to create project -->
        <footer class="confirm-footer">
            <p>On creation all project staff, including the client, will be notified that the project has been
                created. </p>
            <button class="btn btn-default">Create Project</button>
        </footer>

    </section>
</template>

<script>
import PipelinePhaseCard from './PipelinePhaseCard';
import StaffMemberCard from './StaffMemberCard';

export default {
    name: "ConfirmProject",
    components: {
        PipelinePhaseCard,
        StaffMemberCard
    },
    data() {
        return {
            debug: false,
        };
    },
    computed: {
        project() {
            return this.$store.state.projects.newProject;
        }
    }
}
</script>

<style lang="scss">
.confirm-project {
    &__head {
        margin-bottom: 20px;
    }
}
.confirm-panel-inner {
    padding: 20px;
    background-color: $light-grey;
    border-radius: $border-radius;
    margin-bottom: 20px;
}
.confirm-staff {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}
</style>
