<template>
    <section>
        <header class="pc-head">
            <h2>Create Pipeline</h2>
            <em>Pipeline can be adjusted after project creation.</em>
        </header>

        <div class="pc-sections">
            <draggable v-model="pipelineSections" ghost-class="pc-card--dragged">
                <transition-group name="slide-fade">
                    <pipeline-phase-card v-for="(section, index) in pipelineSections" :key="index" :section="section" :index="index" />
                </transition-group>
            </draggable>
            <button class="btn btn-default" @click="addSection">
                Add Pipeline Section
                <i class="far fa-plus-square"></i>
            </button>
        </div>

        <select-entity-modal v-if="entityModalActive" @entitySelected="entitySelected" />

    </section>
</template>

<script>
import SelectEntityModal from "@/components/projects/wizard/SelectEntityModal";
import { VueDraggableNext } from 'vue-draggable-next'
import PipelinePhaseCard from './PipelinePhaseCard.vue';

export default {
    name: "CreatePipeline",
    components: {
      SelectEntityModal,
      draggable: VueDraggableNext,
      PipelinePhaseCard,
    },
    data() {
        return {
            name: "",
            pipelineSections: [],
            dragging: false,
        };
    },
    computed: {
        entityModalActive() {
            return this.$store.state.projects.entityModalActive;
        },
    },
    methods: {
        addSection() {
            const emptySection = { name: 'Pipeline Section', entities: [], edit: false };
            this.pipelineSections.push(emptySection);
        },
        entitySelected(entity, index) {
            this.pipelineSections[index].entities.push(entity);
        },
        log(event) {
            console.log(event)
        },
    },
    
}
</script>

<style lang="scss">
.slide-fade-enter-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-leave-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
.pc-head {
    margin-bottom: 20px;
}
</style>
