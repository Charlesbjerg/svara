<template>
    <div class="board-outer">
        <div class="board">
            <section class="board__column" v-for="column in columns" :key="column.id">
                <header class="board__column-top">
                    <h2 class="board__column-title">{{ column.name }}</h2>
                    <span class="board__column-count">{{ column.cards.length }}</span>
                </header>
                <ul class="board__column-cards">
                    <draggable ghost-class="board-card--dragged">
                        <transition-group name="slide-fade">
                            <li class="board-card" @click="openCard" v-for="card in column.cards" :key="card.id">
                                <span class="board-card__title">{{ card.name }}</span>
                                <div class="board-card__icons">
                                    <div class="board-card__icon">
                                        <i class="far fa-images"></i>
                                        2
                                    </div>
                                </div>
                            </li>
                        </transition-group>
                    </draggable>
                </ul>
                <button class="btn btn-default" @click="addCard">
                    Add Card
                    <i class="far fa-plus-square"></i>
                </button>
            </section>
        </div>
        re
    </div>

</template>

<script>
import {VueDraggableNext} from "vue-draggable-next";

export default {
    name: "boards.vue",
    components: {
        draggable: VueDraggableNext,
    },
    data() {
        return {
            columns: [
                {
                    name: "Backlog",
                    id: 1,
                    cards: [
                        {
                            id: 1,
                            name: "Backlog task"
                        },
                        {
                            id: 2,
                            name: "Backlog task 2"
                        },
                        {
                            id: 3,
                            name: "Backlog task 3"
                        },
                    ],
                },
                {
                    name: "Todo",
                    id: 2,
                    cards: [
                        {
                            id: 4,
                            name: "Backlog task 4"
                        },
                        {
                            id: 5,
                            name: "Backlog task 5"
                        },
                        {
                            id: 6,
                            name: "Backlog task 6"
                        },
                    ],
                },
            ]
        };
    },
    async mounted() {
        // TODO: Either fetch existing data or start from scratch
    },
    methods: {
        openCard() {
            // TODO: Open a detailed view of the card in a modal
        }
    }
}
</script>

<style lang="scss" scoped>
.board-outer {
    position: relative;
    height: 100%;
}

.board {
    display: flex;
    white-space: nowrap;
    user-select: none;
    overflow-y: hidden;
    overflow-x: auto;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: calc(100vh - 225px);
    @include custom-scrollbar;

    &__column {
        min-width: 300px;
        flex-basis: 300px;
        height: fit-content;
        padding: 1em;
        margin-right: 2em;
        border-radius: $border-radius;
        background-color: $light-grey;
        @include box-shadow;
    }

    &__column-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1em;
    }

    &__column-title {
        font-size: $font-md;
        margin: 0;
    }

    &__column-count {
        width: 25px;
        height: 25px;
        padding: 0.25em;
        text-align: center;
        color: #fff;
        font-family: $font-heading;
        border-radius: $border-radius;
        @include gradient-purple;
    }

    &__column-cards {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    &__column-cards .board-card {
        margin-bottom: 0.75em;
    }
}

.board-card {
    border: 2px solid $grey;
    background-color: #fff;
    padding: 10px;
    border-radius: $border-radius;
    //@include box-shadow;
    &__title {
        display: block;
        margin-bottom: 0.25em;
    }
}
</style>
