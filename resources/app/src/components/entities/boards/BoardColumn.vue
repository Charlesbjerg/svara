<template>
    <section class="board__column">
        <header class="board__column-top">
            <input type="text" name="columnName" class="board-column__input" v-if="edit" v-model="column.name"
                   @blur.native="nameUpdated" autocomplete="off" placeholder="Column Name"/>
            <h2 class="board__column-title" v-else @click="editName">{{ column.name }}</h2>
            <span class="board__column-count">{{ column.cards.length }}</span>
        </header>
		<draggable v-model="column.cards" group="board" item-key="id" @change="update">
			<template #item="{element}">
				<board-card :card="element"/>
			</template>
		</draggable>
        <button class="btn btn-default" @click="addCard(column.id)">
            Add Card
            <i class="far fa-plus-square"></i>
        </button>
    </section>
</template>

<script>
import draggable from 'vuedraggable';
import BoardCard from "./BoardCard";

export default {
    name: "BoardColumn",
    components: {
        BoardCard,
		draggable
    },
    props: {
        columnIndex: {
            required: true,
            type: Number,
        }
    },
    data() {
        return {
            edit: false,
            init: true,
        };
    },
	computed: {
		board() {
			return this.$store.state.entities.board.data;
		},
		column: {
			get() {
				return this.$store.state.entities.board.data.columns[this.columnIndex];
			},
			set(value) {
				this.$store.commit('entities/updateColumn', { index: this.columnIndex, value });
			}
		},
		user() {
			return this.$store.state.auth.user.id
		}
	},
    mounted() {
        this.$nextTick(function () {
            if (this.column.name === "") {
                this.edit = true;
                this.init = false;
            }
        });
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
                this.init = true;
            } else if (this.column.name !== "" && this.init) {
                const response = await this.$api(`api/projects/pipeline/boards/column/${this.column.id}`, 'PATCH', {
                    name: this.column.name,
                    boardId: this.board.id,
                });
            }
            this.edit = false;
        },
        editName() {
            this.edit = true;
        },
        addCard(columnId) {
            const column = this.board.columns.find(col => col.id === columnId);
            column.cards.push({name: '', id: null, columnId: column.id});
        },
        async update() {
        	// TODO: Need to update and maintain a sort order -> DB column needs adding for this
        	this.$emit('boardUpdate');
        },
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
