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
      <button class="btn btn-default" @click="openEntityModal(index)" aria-label="Add Entity to Section">
        <i class="far fa-plus-square"></i>
      </button>
    </div>
    <div class="pc-card__entities" v-if="section.entities.length > 0">
      <article class="pc-entity" v-for="(entity, entityIndex) in section.entities" :key="entityIndex">
            <i class="pc-entity__icon fa" :class="entityIcon(entity)"></i>
            <h4 class="pc-entity__name">{{ entity.name }}</h4>
            <button type="button" class="pc-entity__remove"
                    aria-label="Remove this entity from the pipeline"
                    @click="remove(entityIndex)">
                <i class="fas fa-trash"></i>
            </button>
      </article>
    </div>
    <button type="button" class="pc-card__remove"
            aria-label="Remove this entity from the pipeline"
            @click="removePhase">
        <i class="fas fa-trash"></i>
    </button>
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
            this.$store.commit('projects/openEntityModal', index);
        },
        removePhase() {
            this.$emit('removePhase')
        },
        remove(index) {
            this.section.entities.splice(index, 1);
        },
        entityIcon(entity) {
            return entity.iconSmall;
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

<style lang="scss" scoped>
.pc-card {
    margin: 0 0 15px;
    cursor: grab;
    position: relative;
    &__inner {
        padding: 20px;
        border-top-left-radius: $border-radius;
        border-top-right-radius: $border-radius;
        background-color: darken($light-grey, 5%);
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
    &__entities {
        padding: 20px;
        background-color: $light-grey;
        border-bottom-left-radius: $border-radius;
        border-bottom-right-radius: $border-radius;
    }
    &__remove {
        position: absolute;
        top: 0;
        right: -20px;
        z-index: -1;
        height: 100%;
        width: 35px;
        background-color: $grey;
        color: #fff;
        opacity: 0.3;
        border: 0;
        border-top-right-radius: $border-radius;
        border-bottom-right-radius: $border-radius;
        cursor: pointer;
        @include transition-bounce;
        &:hover {
            background-color: $error-red;
            transform: translate3d(12px, 0, 0);
            opacity: 1;
        }
        &:focus {
            outline: none;
        }
    }

    /* Modifiers */
    &--dragged {
        @include box-shadow-hover;
        opacity: 0.5;
    }
}

.pc-entity {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    &:last-child {
        margin-bottom: 0;
    }
    &__icon {

    }
    &__name {
        flex-grow: 1;
        margin: 0 0 0 10px;
    }
    &__remove {
        border: 2px solid transparent;
        border-radius: $border-radius;
        margin: 0 5px 0 0;
        padding: 5px 8px;
        background-color: transparent;
        cursor: pointer;
        transform-origin: center;
        @include transition-bounce;
        &:hover {
            transform: scale(1.1);
            border-color: $error-red;
            color: $error-red;
        }
        &:focus {
            outline: none;
        }
    }
}
</style>
