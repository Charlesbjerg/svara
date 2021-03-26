<template>
    <li class="board-card" @click="openCard">
        <input type="text"
               class="board-card__title"
            v-if="edit"
            v-model="card.name"
            v-focus=""
            @blur.native="edit = false"
        />
        <span class="board-card__title" v-else @click="edit = true">{{ card.name }}</span>
        <div class="board-card__icons">
            <div class="board-card__icon">
                <i class="far fa-images"></i>
                Int
            </div>
        </div>
    </li>
</template>

<script>
export default {
    name: "BoardCard",
    props: {
        card: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            edit: false,
        };
    },
    methods: {
        openCard() {
            this.$store.commit('entities/setOpenCard', this.card);
        }
    },
    directives: {
        focus: {
            inserted (el) {
                el.focus()
            }
        }
    }
};
</script>

<style lang="scss">
.board-card {
    border: 2px solid $grey;
    background-color: #fff;
    padding: 10px;
    border-radius: $border-radius;
    cursor: grab;
    &__title {
        display: block;
        margin-bottom: 0.5em;
        font-family: $font-heading;
        padding: 0.25em 0;
    }
}
</style>
