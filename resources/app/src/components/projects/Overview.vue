<template>
    <div class="project-overview">
        <div class="project-overview__column">
            <project-meta icon="far fa-calendar-alt" :metaKey="firstMetaKey" :value="firstMetaValue" v-if="hasFirstMeta" />
            <project-pipeline-mini />
        </div>
        <div class="project-overview__column">
            <project-staff />
            <project-meta icon="far fa-money-bill-alt" :metaKey="secondMetaKey" :value="secondMetaValue" v-if="hasSecondMeta"/>
        </div>
        <div class="project-overview__column">
            <project-overview-mini />
            <project-meta icon="fas fa-puzzle-piece" metaKey="Currently In" :value="currentPhaseName"/>
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
        },
        firstMetaKey() {
            return this.project.meta[0].key;
        },
        firstMetaValue(){
            return this.project.meta[0].value;
        },
        secondMetaKey() {
            return this.project.meta[1].key;
        },
        secondMetaValue() {
            return this.project.meta[1].value;
        }
    },
    methods: {
        hasFirstMeta() {
            return this.project.hasOwnProperty('meta') && this.project.meta.length > 0;
        },
        hasSecondMeta() {
            return this.project.hasOwnProperty('meta') && this.project.meta.length >= 2;
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
