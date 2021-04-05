<template>
    <div class="project-overview">
        <div class="project-overview__column">
            <project-meta icon="calendar-alt" metaKey="Delivery Date" value="24th March 2020"/>
            <project-pipeline-mini />
        </div>
        <div class="project-overview__column">
            <project-staff />
            <project-meta icon="sack" metaKey="Project Value" value="£27,500"/>
        </div>
        <div class="project-overview__column">
            <project-overview-mini />
            <project-meta metaKey="Currently In The" :value="currentPhaseName"/>
            <project-activity-log />
        </div>
    </div>
</template>

<script>
import ProjectMeta from "./ProjectMeta";
import ProjectPipelineMini from "./overview/ProjectPipelineMini";
import ProjectStaff from "./overview/ProjectStaff";
import ProjectOverviewMini from "./overview/ProjectOverviewMini";
import ProjectActivityLog from "./overview/ProjectActivityLog";
import { mapGetters } from "vuex";

export default {
    name: "Overview.vue",
    components: {
        ProjectMeta,
        ProjectPipelineMini,
        ProjectStaff,
        ProjectOverviewMini,
        ProjectActivityLog
    },
    computed: {
        ...mapGetters({
            project: 'projects/getCurrentProject',
            currentPhase: 'projects/getCurrentPhase',
        }),
        currentPhaseName() {
            let phaseString = 'New Project Phase';
            if (this.project.pipeline.length > 0) {
                phaseString = `${this.currentPhase.name} Phase`
            }
            return phaseString;
        }
    }
}
</script>

<style lang="scss" scoped>
.project-overview {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 30px;
    &__column > * {
        margin-bottom: 30px;
        &:last-child {
            margin-bottom: 0;
        }
    }
}
</style>
