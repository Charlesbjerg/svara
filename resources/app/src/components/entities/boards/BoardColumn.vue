<template>
    <section class="board__column">
        <header class="board__column-top">
            <input type="text" name="columnName" class="board-column__input" v-if="edit" v-model="column.name"
                   @blur.native="nameUpdated" autocomplete="off" placeholder="Column Name"/>
            <h2 class="board__column-title" v-else @click="editName">{{ column.name }}</h2>
            <span class="board__column-count">{{ column.cards.length }}</span>
        </header>
        <ul class="board__column-cards"
            v-for="card in column.cards"
            @change="cardUpdate"
            :key="card.cardId">
            <board-card :card="card"/>
        </ul>
        <button class="btn btn-default" @click="addCard(column.id)">
            Add Card
            <i class="far fa-plus-square"></i>
        </button>
    </section>
</template>

<script>
import BoardCard from "./BoardCard";

export default {
    name: "BoardColumn",
    components: {
        BoardCard,
    },
    props: {
        column: {
            required: true,
            type: Object,
        }
    },
    data() {
        return {
            edit: false,
            init: true,
            updateTimeout: null,
        };
    },
    mounted() {
        this.$nextTick(function () {
            if (this.column.name === "") {
                this.edit = true;
                this.init = false;
            }
        });
    },
    computed: {
        board() {
            return this.$store.state.entities.board.data;
        },
        user() {
            return this.$store.state.auth.user.id
        }
    },
    methods: {
        async nameUpdated() {
            // If this is a new column create new in DB, otherwise update
            if (this.column.name !== "" && !this.init) {
                const response = await this.$api('api/projects/pipeline/boards/column', 'POST', {
                    name: this.column.name,
                    boardId: this.board.id,
                    createdById: this.user.id,
                });
                this.updateColumn(response.data);
                this.init = true;
            } else if (this.column.name !== "" && this.init) {
                const response = await this.$api(`api/projects/pipeline/boards/column/${this.column.id}`, 'PATCH', {
                    name: this.column.name,
                    boardId: this.board.id,
                });
                this.updateColumn(response.data);
            }
            this.edit = false;
        },
        editName() {
            this.edit = true;
        },
        addCard(columnId) {
            const column = this.board.columns.find(col => col.id === columnId);
            column.cards.push({name: '', id: null, columnId: column.id});
            this.$emit('reinit');
        },
        async cardUpdate(event) {
            if (event.hasOwnProperty('newDraggableIndex')) {
                clearTimeout(this.updateTimeout);
                this.updateTimeout = await setTimeout(async () => {
                    this.$store.commit('util/enableSpinner');
                    await this.$api(`api/projects/pipeline/boards/${this.board.pipelineEntityId}`, 'PATCH', this.board);
                    this.$store.commit('util/disableSpinner');
                }, 5000);
            }
        },
        updateColumn(newData) {
            // TODO: Find column in board in vuex store and update data there
        }
    },
}
</script>

<style lang="scss">
.board-column {
    &__input {
        padding: 0.5em 0.25em;
        font-family: $font-heading;
    }
}
</style>
