<template>
    <aside class="new-thread-outer">
        <div class="new-thread-overlay"></div>
        <div class="new-thread-modal">
            <header class="new-thread-modal__head">
                <h2 class="card-modal__title">Create New Thread</h2>
                <button class="card-modal__close" @click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </header>
            <div class="fields">
                <div class="form-item">
                    <label for="threadName">Thread Name</label>
                    <input type="text" v-model="threadName" id="threadName" required />
                </div>
                <div class="form-item">
                    <label for="addClient">
                        <input type="checkbox" v-model="addClient" id="addClient" />
                        Add the client to this thread
                    </label>
                </div>
            </div>
        </div>
    </aside>
</template>

<script>
export default {
    name: "NewThread",
    data() {
        return {
            threadName: '',
            addClient: false,
        }
    },
    methods: {
        closeModal() {

        }
    }
}
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
    max-width: 600px;
    padding: 20px 90px 20px 30px;
    background-color: #fff;
    transform: translate3d(100%, 0, 0);
    @include transition-bounce;

    &__head {
        margin-bottom: 1em;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    &__close {
        @include gradient-red;
        border: 0;
        border-radius: $border-radius;
        width: 32px;
        height: 32px;
        color: #fff;
        cursor: pointer;
        @include box-shadow-sm;
        @include transition-default;

        i {
            transform-origin: center;
            @include transition-bounce;
        }

        &:hover {
            transform: rotate(-10deg);
        }

        &:hover i {
            transform: rotate(190deg);
        }
    }
}
</style>
