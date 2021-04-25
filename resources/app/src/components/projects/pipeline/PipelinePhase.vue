<template>
    <article class="pipe-phase" :class="cardClasses">
        <h3>{{ phase.name }}</h3>
        <ul class="pipe-phase__entities">
            <li class="pipe-phase-entity" v-for="entity in phase.entities" :key="entity.id" @click="viewEntity(entity)">
                <i class="fa" :class="entity.icon_small"></i>
                {{ entity.name }}
            </li>
        </ul>
        <button class="btn btn-success btn-disabled" v-if="phase.complete" disabled>Phase Complete</button>
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
		cardClasses() {
        	return `${this.activeItemClass} ${this.completedItemClass}`;
		} ,
        activeItemClass() {
            return this.activePhase.id === this.phase.id ? 'pipe-phase--active' : '';
        },
		completedItemClass() {
        	return this.phase.complete ? 'pipe-phase--complete' : '';
		}
    },
    methods: {
        viewEntity(entity) {
            this.$router.push({ name: 'projects.entity', params: { id: entity.pid } })
        },
        canComplete() {
            let canCompletePhase = true;

            // Find sign offs and check properties to see if has been signed off.
            const hasSignOffs = this.phase.entities.filter(entity => entity.component_name === 'sign-off');
            hasSignOffs.forEach(item => {
            	if (!item.hasOwnProperty('signedOff') || item.signedOff !== true) {
            		canCompletePhase = false;
				}
			})

            return canCompletePhase
        },
        completePhase() {
            if (this.canComplete()) {
                this.$emit('phaseCompleted');
            } else {
            	console.log("Cannot complete");
            	this.$store.commit('util/setGlobalNotif', { message: 'Project phase cannot yet be completed, is there a sign off required?', type: 'error' });
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
		border: 2px solid transparent;
        &__entities {
            list-style-type: none;
            padding: 0;
        }
		&--complete,
        &--active {
            opacity: 1;
            pointer-events: all;
        }
		&--active {
			border-color: $accent-colour;
		}
    }
    .pipe-phase-entity {
        margin-bottom: 10px;
    }
</style>
