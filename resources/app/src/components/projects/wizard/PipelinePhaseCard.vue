<template>
  <article class="pc-card" >
    <i class="pc-card__line"></i>
    <div class="pc-card__inner">
      <div class="pc-card__content">
        <input
          type="text"
          class="pc-card__name-input"
          v-if="edit"
          v-model="section.name"
          v-focus=""
          @blur.native="edit = false"
        />
        <h3 class="pc-card__name" v-else @click="edit = true">{{ section.name }}</h3>
        <em class="pc-card__total">{{ section.entities.length }} Entities in Phase</em>
      </div>
      <button class="btn btn-default" @click="openEntityModal(index)" aria-label="Add Entity to Section"
      >
        <i class="far fa-plus-square"></i>
      </button>
    </div>
    <div class="pc-card__entities">
      <article class="pc-entity" v-for="(entity, index) in section.entities" :key="index">
        {{ entity.name }}
      </article>
    </div>
  </article>
</template>

<script>
export default {
    name: "PipelinePhaseCard",
    data() {
        return {
            edit: false,
        };
    },
    props: {
        section: {
            required: true,
            type: Object,
        },
        index: {
            required: true,
            type: Number,
        }
    },
    methods: {
        openEntityModal(index) {
            console.log(`Opening entity modal with index of ${index}`)
            this.$store.commit('projects/openEntityModal', index);
            console.log(`State value of`, this.$store.state.projects);
        },
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
.pc-card {
    cursor: grab;
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
    &--dragged {
        @include box-shadow-hover;
        opacity: 0.5;
    }
}
</style>