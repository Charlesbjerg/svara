<template>
    <article class="pipe-phase" :class="activeItemClass">
        <h3>{{ phase.name }}</h3>
        <ul class="pipe-phase__entities">
            <li class="pipe-phase-entity" v-for="entity in phase.entities" :key="entity.id" @click="viewEntity(entity)">
                <i class="fa" :class="entity.icon_small"></i>
                {{ entity.name }}
            </li>
        </ul>
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
            return this.activePhase.id === this.phase.id ? 'pipe-phase--active' : '';
        }
    },
    methods: {
        viewEntity(entity) {
            // TODO: Need to push the pivot ID to load data correctly
            this.$router.push({ name: 'projects.entity', params: { id: entity.pid } })
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
