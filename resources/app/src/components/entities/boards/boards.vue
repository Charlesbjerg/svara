<template>
    <div class="board-outer">
        <div class="board">
            <board-column v-for="(column, index) in board.columns" :key="column.id" :columnIndex="index" @boardUpdate="update"/>
            <button class="btn btn-default add-column-btn" @click="addColumn">
                Add Column
                <i class="far fa-plus-square"></i>
            </button>
        </div>
        <card-modal v-if="modalActive" />
    </div>

</template>

<script>
import CardModal from "./CardModal";
import BoardColumn from "./BoardColumn";

export default {
    name: "Boards",
    components: {
        BoardColumn,
        CardModal
    },
   	data() {
    	return {
    		updateTimeout: null,
		};
	},
    computed: {
        modalActive() {
            return this.$store.state.entities.board.openCard !== null;
        },
        board() {
            return this.$store.state.entities.board.data;
        }
    },
	async mounted() {
		// Fetch Data
		this.$store.commit('util/enableLoader');
		const response = await this.$api(`api/projects/pipeline/boards/${this.$route.params.id}`)
		this.$store.commit('entities/setBoardData', response.data);
		this.$store.commit('util/disableLoader');
	},
    methods: {
        addColumn() {
            this.board.columns.push({ name: "", id: null, cards: [] });
        },
		async update() {
			clearTimeout(this.updateTimeout);
			this.updateTimeout = setTimeout(async () => {
				this.$store.commit('util/enableLoader');
				await this.$api(`api/projects/pipeline/boards/${this.board.pipelineEntityId}`, 'PATCH', this.board);
				this.$store.commit('util/disableLoader');
			}, 2500);
		}
    }
}
</script>

<style lang="scss">
.board-outer {
    position: relative;
    height: 100%;
}

.board {
    display: flex;
    white-space: nowrap;
    user-select: none;
    overflow-y: auto;
    overflow-x: auto;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: calc(100vh - 225px);
	padding-bottom: 50px;
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
