<template>
    <article class="pipe-phase" :class="activeItemClass">
        <h3>{{ phase.name }}</h3>
        <ul class="pipe-phase__entities">
            <li class="pipe-phase-entity" v-for="entity in phase.entities" :key="entity.id" @click="viewEntity(entity)">
                <i class="fa" :class="entity.icon_small"></i>
                {{ entity.name }}
            </li>
        </ul>
        <button class="btn btn-default btn-disabled" v-if="phase.complete" disabled>Phase Complete</button>
        <button class="btn btn-default" @click="completePhase" v-else>Complete Phase</button>
    </article>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: "PipelinePhase",
    props: {
        phase: {
            required: true,
            type: Object,
        },
    },
    computed: {
        ...mapGetters({
            project: 'projects/getCurrentProject',
            activePhase: 'projects/getCurrentPhase',
        }),
        activeItemClass() {
            return this.activePhase.id === this.phase.id || this.phase.complete ? 'pipe-phase--active' : '';
        }
    },
    methods: {
        viewEntity(entity) {
            this.$router.push({ name: 'projects.entity', params: { id: entity.pid } })
        },
        canComplete() {
            let canCompletePhase = true;
            const hasSignOffs = this.phase.entities.filter(entity => entity.component_name === 'sign-off');
            console.log(hasSignOffs);
            if (hasSignOffs.length > 0) {
                canCompletePhase = false;
            }
            return canCompletePhase
        },
        completePhase() {
            if (this.canComplete()) {
                this.$emit('phaseCompleted');
            }
        }
    }
}
</script>

<style lang="scss">
    .pipe-phase {
        background-color: $light-grey;
        border-radius: $border-radius;
        padding: 20px;
        opacity: 0.6;
        pointer-events: none;
        &__entities {
            list-style-type: none;
            padding: 0;
        }
        &--active {
            opacity: 1;
            pointer-events: all;
        }
    }
    .pipe-phase-entity {
        margin-bottom: 10px;
    }
</style>
