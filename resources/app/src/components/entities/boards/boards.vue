<template>
    <div class="board-outer">
        <div class="board">
            <section class="board__column" v-for="column in columns" :key="column.id">
                <header class="board__column-top">
                    <h2 class="board__column-title">{{ column.name }}</h2>
                    <span class="board__column-count">{{ column.cards.length }}</span>
                </header>
                <ul class="board__column-cards"
                    v-for="card in column.cards"
                    @change="log"
                    :key="card.cardId">
                    <board-card :card="card" />
                </ul>
                <button class="btn btn-default" @click="addCard(column.id)">
                    Add Card
                    <i class="far fa-plus-square"></i>
                </button>
            </section>
            <button class="btn btn-default add-column-btn" @click="addColumn">
                Add Column
                <i class="far fa-plus-square"></i>
            </button>
        </div>
        <card-modal v-if="modalActive" />
    </div>

</template>

<script>
import Sortable from 'sortablejs';
import BoardCard from "./BoardCard";
import CardModal from "./CardModal";

export default {
    name: "boards.vue",
    components: {CardModal, BoardCard},
    data() {
        return {
            columns: [
                {
                    name: "Backlog",
                    id: 1,
                    cards: [
                        {
                            cardId: 1,
                            name: "Backlog task"
                        },
                        {
                            cardId: 2,
                            name: "Backlog task 2"
                        },
                        {
                            cardId: 3,
                            name: "Backlog task 3"
                        },
                    ],
                },
                {
                    name: "Todo",
                    id: 2,
                    cards: [
                        {
                            cardId: 4,
                            name: "Backlog task 4"
                        },
                        {
                            cardId: 5,
                            name: "Backlog task 5"
                        },
                        {
                            cardId: 6,
                            name: "Backlog task 6"
                        },
                    ],
                },
            ]
        };
    },
    async mounted() {
        // TODO: Either fetch existing data or start from scratch

        // After data shows up, init sortable
        this.initSortable();
    },
    computed: {
        modalActive() {
            return this.$store.state.entities.board.openCard !== null;
        }
    },
    methods: {
        addCard(columnId) {
            const column = this.columns.find(col => col.id === columnId);
            column.cards.push({ name: '', id: null, });
        },
        addColumn() {
            this.columns.push({ name: "New Column", id: null, cards: [] });
        },
        log(evt) {
            window.console.log(evt);
            console.log(this.columns);
            // TODO: Maybe use the event/method to make API calls to update board
        },
        initSortable() {
            document.querySelectorAll('.board__column-cards').forEach((column, index) => {
                // TODO: Need to update the sortable instances when a new card or column is added
                // http://sortablejs.github.io/
                new Sortable(column, {
                    group: 'board',
                    animation: 200,
                });
            });
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

.add-column-btn {
    width: 300px;
    height: 40px;
}
</style>
