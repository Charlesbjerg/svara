<template>
    <div class="pc-wizard-outer">
        <section class="pc-wizard">
            <wizard-steps />
            <div class="pc-wizard__view">
                <essential-data :class="activeView(1)" class="pc-wizard__item" />
                <project-staff :class="activeView(2)" class="pc-wizard__item" />
                <pipeline-setup :class="activeView(3)" class="pc-wizard__item" />
                <pipeline-templates :class="activeView(4)" class="pc-wizard__item" v-if="this.usingTemplates" />
                <create-pipeline :class="activeView(4)" class="pc-wizard__item" v-if="this.usingNewPipeline" />
                <confirm-project :class="activeView(5)" class="pc-wizard__item" />
            </div>
        </section>
    </div>
</template>

<script>
import WizardSteps from "./WizardSteps";
import EssentialData from "./EssentialData";
import ProjectStaff from "./ProjectStaff";
import PipelineSetup from "./PipelineSetup";
import ConfirmProject from "./ConfirmProject";
import PipelineTemplates from "./PipelineTemplates";
import CreatePipeline from "./CreatePipeline";

export default {
    name: "ProjectCreateWizard",
    components: {
        PipelineTemplates,
        ConfirmProject,
        PipelineSetup,
        ProjectStaff,
        EssentialData,
        WizardSteps,
        CreatePipeline
    },
    mounted() {
      this.$store.commit('projects/setCurrentStep', 1);
    },
    computed: {
        currentStep() {
            return this.$store.state.projects.currentStep;
        },
        usingTemplates() {
            return this.$store.state.projects.newProject.usingTemplate;
        },
        usingNewPipeline() {
            return this.$store.state.projects.newProject.newPipeline;
        },
    },
    methods: {
        activeView(step) {
            return this.currentStep === step ? 'active' : '';
        }
    }
}
</script>

<style lang="scss">
.pc-wizard-outer {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 30px;
}
.pc-wizard {
    @include box-shadow;
    border-radius: $border-radius;
    width: 100%;
    max-width: 1200px;
    height: 900px;
    &__view {
        padding: 0 30px 30px;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        height: 100%;
        max-height: 900px;
        overflow-y: auto;
        @include custom-scrollbar;
    }
    &__item {
        grid-row: 1;
        grid-column: 1;
        z-index: 2;
        opacity: 0;
        pointer-events: none;
        @include transition-default;
        &.active {
            opacity: 1;
            pointer-events: all;
        }
    }
}
</style>
