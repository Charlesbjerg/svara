<template>
    <section>
        <header class="pc-head">
            <h2>Create Pipeline</h2>
            <em>Pipeline can be adjusted after project creation.</em>
        </header>

        <div class="pc-sections">
            <article class="pc-card" v-for="(section, index) in pipelineSections" :key="index">
                <i class="pc-card__line"></i>
                <div class="pc-card__inner">
                    <div class="pc-card__content">
                        <input type="text"
                               class="pc-card__name-input"
                               v-if="section.edit"
                               v-model="section.name"
                               v-focus=""
                               @blur.native="section.edit = false;"/>
                        <h3 class="pc-card__name" v-else @click="section.edit = true;">{{ section.name }}</h3>
                        <em class="pc-card__total">{{ section.entities.length }} Entities in Phase</em>
                    </div>
                    <button class="btn btn-default" @click="openEntityModal(index)" aria-label="Add Entity to Section">
                        <i class="far fa-plus-square"></i>
                    </button>
                </div>
                <div class="pc-card__entities">
                    <article class="pc-entity" v-for="(entity, index) in section.entities" :key="index">
                        {{ entity.name }}
                    </article>
                </div>
            </article>
            <button class="btn btn-default" @click="addSection">
                Add Pipeline Section
                <i class="far fa-plus-square"></i>
            </button>
        </div>

        <hr/>

        <div class="pc-sections">
            <!-- TODO: Cards need to be draggable -->
            <article class="pc-card">
                <i class="pc-card__line"></i>
                <div class="pc-card__inner">
                    <!-- TODO: Need to be able to click to edit name inline -->
                    <h3 class="pc-card__name">Initial Consult</h3>
                    <em class="pc-card__total">3 Entities in Phase</em>
                    <!-- TODO: Add arrow icon as ::after -->
                </div>
                <div class="pc-card__entities">
                    <!-- TODO: Should be its own component -->
                    <article class="pc-entity">
                        <h4 class="pc-entity__name">Project Design Must Have's</h4>
                        <p class="pc-entity__type">Board </p>
                        <!-- TODO: Add minus icon as ::after -->
                    </article>
                </div>
            </article>
        </div>

        <!-- Create Pipeline Section - Needs a name -->
        <!-- Add Elements to Section - Choose from list of entities -->

        <select-entity-modal v-if="entityModalActive"
                             :index="entityModalSection"
                             @entitySelected="entitySelected"
                             @modalClosed="entityModalActive = false; entityModalSection = null;" />


    </section>
</template>

<script>
import SelectEntityModal from "@/components/projects/wizard/SelectEntityModal";

export default {
    name: "CreatePipeline",
    components: {
      SelectEntityModal
    },
    data() {
        return {
            name: "",
            pipelineSections: [],
            entityModalActive: false,
            entityModalSection: null,
        };
    },
    methods: {
        addSection() {
            const emptySection = { name: 'Pipeline Section', entities: [], edit: false };
            this.pipelineSections.push(emptySection);
        },
        openEntityModal(index) {
            this.entityModalActive = true;
            this.entityModalSection = index;
        },
        entitySelected(entity, index) {
            this.pipelineSections[index].entities.push(entity);
        }
    },
    directives: {
        focus: {
            inserted (el) {
                el.focus()
            }
        }
    }
}
</script>

<style lang="scss">
.pc-head {
    margin-bottom: 20px;
}
.pc-sections {}
.pc-card {
    &__inner {
        padding: 20px;
        border-radius: $border-radius;
        background-color: darken($light-grey, 5%);
        margin: 0 0 15px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    &__line {
        height: 100%;
        display: flex;
        align-items: center;
        color: $accent-colour;
    }
    &__name-input {
        font-family: $font-heading;
        font-weight: $font-weight-heading;
        font-size: $font-sm;
        border: 0;
        border-bottom: 1px solid $grey;
        margin: 0 0 10px;
        padding: 5px 0;
        color: $font-color;
        display: block;
        outline: none;
    }
}
</style>
