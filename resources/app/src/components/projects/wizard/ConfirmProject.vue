<template>
    <section class="confirm-project">

        <pre v-if="debug">{{ project }}</pre>

        <header class="confirm-project__head">
            <h2>Confirm New Project</h2>
            <em>Confirm the data for the new project is correct.</em>
        </header>

        <div class="confirm-panel-inner">

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
            <section class="confirm-section">
                <h3>Project Pipeline</h3>
                <div class="pipe-items-card">
                    <div class="pipe-item" v-for="(section, index) in project.pipeline" :key="index">
                        <strong class="pipe-item__name">{{ section.name }}</strong>
                        <ul class="pipe-item__entities">
                            <li class="pipe-item__entity" v-for="(entity, index) in section.entities" :key="index">
                                <i class="pipe-item__icon fa" :class="entity.iconSmall"></i>
                                {{entity.name}}
                            </li>
                        </ul>
                    </div>
                </div>
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
    border-radius: $border-radius;
    margin-bottom: 20px;
    border: 2px solid $light-grey;
    @include box-shadow;
}
.confirm-staff {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}
.confirm-section {
    margin: 0 0 20px;
}
.pipe-items-card {
    border-radius: $border-radius;
    @include box-shadow;
    padding: 20px;
    background-color: $light-grey;
}
.pipe-item {
    &__name {
        font-family: $font-heading;
    }
    &__entities {
        list-style-type: none;
        padding: 0;
    }
    &__entity {
        font-family: $font-heading;
        position: relative;
        padding: 0 0 0 30px;
        margin-bottom: 5px;
        &::before {
            content: "";
            display: block;
            width: 15px;
            height: 23px;
            position: absolute;
            top: -13px;
            left: 10px;
            border-bottom: 1px solid $grey;
            border-left: 1px solid $grey;
        }
        &:first-child::before {
            top: 0;
            height: 10px;
        }
    }
    &__icon {
        width: 20px;
    }
}
</style>
