<template>
    <div class="card-modal-outer" :class="modalActive">
        <aside class="card-modal">
            <h2 class="card-modal__title">{{ card.name }}</h2>
            <button @click="closeModal">Close</button>
            <div class="card-modal__body">
                <!-- TODO: Add fields for: user assigned to, description, label and attached image -->
            </div>
        </aside>
        <div class="card-modal-overlay"></div>
    </div>
</template>

<script>
export default {
    name: "CardModal",
    computed: {
        card() {
            return this.$store.state.entities.board.openCard;
        },
        modalActive() {
            return this.card !== null ? 'active' : '';
        }
    },
    methods: {
        closeModal() {
            this.$store.commit('entities/closeCardModal');
        }
    }
};
</script>

<style lang="scss">
.card-modal-outer {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 100;
    pointer-events: none;
    visibility: hidden;
}
.card-modal-overlay {
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0);
    @include transition-default;
}
.card-modal {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 100%;
    max-width: 450px;
    padding: 20px 60px 20px 20px;
    background-color: #fff;
    transform: translate3d(100%, 0, 0);
    @include transition-bounce;
}

.active {
    &.card-modal-outer {
        pointer-events: all;
        visibility: visible;
    }
    .card-modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }
    .card-modal {
        transform: translate3d(10%, 0, 0);
    }
}
</style>
