<template>
    <div class="board-card" @click="openCard">
        <input type="text" name="cardname" class="board-card__input" v-if="edit" v-model="card.name" v-focus="" @blur.native="nameUpdated" autocomplete="off" placeholder="Card Name" />
        <span class="board-card__title" v-else @click="editName">{{ card.name }}</span>
        <div class="board-card__icons">
            <div class="board-card__icon">
                <i class="far fa-clock"></i>
                {{ $timeDifference(card.updatedAt) }}
            </div>
        </div>
    </div>
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
            init: true,
            edit: false,
        };
    },
    mounted() {
    	// Setup blank card, render, then focus
		if (this.card.name === "") {
			this.edit = true;
			this.init = false;
		} else {
			console.log(this.card)
		}
        this.$nextTick(function () {
        	if (this.edit) {
                this.$el.children[0].focus();
            }
        });
    },
    methods: {
        openCard() {
            if (this.init) {
                this.$store.commit('entities/setOpenCard', this.card);
            }
        },
        editName() {
            if (!this.init) {
                this.edit = true;
            }
        },
        nameUpdated() {
            if (this.card.name !== "") {
                this.edit = false;
                this.init = true;
                this.saveCard();
            }
        },
        async saveCard() {
            // TODO: Need to setup the correct route to save a card and update below
            const response = await this.$api('api/projects/pipeline/boards/card', 'POST', this.card);
            this.card = response.data;
            this.$emit('reinit');
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
    background-color: #fff;
    padding: 15px;
    border-radius: $border-radius;
    cursor: grab;
	margin-bottom: 15px;
	@include box-shadow-sm;
    &__input,
    &__title {
        display: block;
        margin-bottom: 0.5em;
        font-family: $font-heading;
        padding: 0.25em 0;
    }
	&__title {
		white-space: pre-wrap;
		line-height: 1.4;
	}
    &__input {
        padding: 0.25em;
    }
}
</style>
