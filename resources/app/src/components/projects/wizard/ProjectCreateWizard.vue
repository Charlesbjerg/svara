<template>
    <div class="pc-wizard-outer">
        <section class="pc-wizard">
            <wizard-steps />
            <div class="pc-wizard__view">
                <essential-data :class="activeView(1)" class="pc-wizard__item" />
                <project-staff :class="activeView(2)" class="pc-wizard__item" />
                <pipeline-setup :class="activeView(3)" class="pc-wizard__item" />
                <confirm-project :class="activeView(4)" class="pc-wizard__item" />
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

export default {
    name: "ProjectCreateWizard",
    components: {
        ConfirmProject,
        PipelineSetup,
        ProjectStaff,
        EssentialData,
        WizardSteps,
    },
    mounted() {
      this.$store.commit('projects/setCurrentStep', 1);
    },
    computed: {
        currentStep() {
            return this.$store.state.projects.currentStep;
        }
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
}
.pc-wizard {
    @include box-shadow;
    border-radius: $border-radius;
    height: 600px;
    width: 100%;
    max-width: 1200px;
    padding: 30px;
    &__view {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
    }
    &__item {
        grid-row: 1;
        grid-column: 1;
        z-index: 2;
        opacity: 0;
        @include transition-default;
        &.active {
            opacity: 1;
        }
    }
}
</style>
