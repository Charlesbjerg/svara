<template>
    <aside class="entity-modal">
        <div class="entity-modal__inner">
            <header class="entity-modal__head">
                <h3 class="entity-modal__title">Select an Entity</h3>
                <button class="entity-modal__close" @click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </header>
            <div class="entity-modal__content">
                <div class="entity-list">
                    <button class="entity-item" v-for="entity in entities" :key="entity.id" @click="selectEntity(entity)">
                        <!-- TODO: Need to display entity icon -->
                        {{ entity.name }}
                    </button>
                </div>
            </div>
        </div>
    </aside>
</template>

<script>
export default {
    name: "SelectEntityModal",
    props: {
        index: {
            required: true,
            type: Number,
        }
    },
    data() {
      return {
          entities: [],
      }
    },
    async mounted() {
        this.$store.commit('util/enableLoader');
        const response = await this.$api('api/projects/pipeline/entities');
        this.entities = response.data;
        this.$store.commit('util/disableLoader');
    },
    methods: {
        closeModal() {
            this.$emit('modalClosed');
        },
        selectEntity(entity) {
            this.$emit('entitySelected', entity, this.index);
            this.closeModal();
        }
    }
}
</script>

<style lang="scss">
.entity-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    &__inner {
        max-width: 1200px;
        width: 100%;
        background-color: #fff;
        border-radius: $border-radius;
        padding: 20px;
        margin: 20px;
    }
    &__head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    &__title {
        font-size: $font-md;
    }
    &__close {
        background-color: transparent;
        border: 0;
        color: $font-color;
        font-size: $font-sm;
        cursor: pointer;
        transform-origin: center;
        @include transition-bounce;
        &:hover {
            transform: scale(1.2);
        }
    }
}
.entity-list {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 30px;
}
</style>
