<template>
    <aside class="action-modal-outer" :class="activeClass" ref="modal">
        <div class="action-modal-overlay"></div>
        <div class="action-modal">
            <header class="action-modal__head">
                <h2 class="action-modal__title">{{ title }}</h2>
                <button class="action-modal__close" @click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </header>
            <component :is="component" v-if="component" @close="closeModal" />
			<slot v-else></slot>
        </div>
    </aside>
</template>

<script>
import AddUser from "./AddUser";
import DeactivateUser from "./DeactivateUser";
import ResetPassword from "./ResetPassword";
import MessageTemplate from "./MessageTemplate";

export default {
    name: "ActionModal",
    components: {
        AddUser,
        DeactivateUser,
        ResetPassword,
		MessageTemplate,
    },
    props: {
        component: {
            type: String,
            required: false,
			default: null,
        },
        title: {
            type: String,
            required: true,
        },
		active: {
        	type: Boolean,
			required: false,
			default: false,
		},
    },
	computed: {
    	activeClass() {
    		return this.active ? 'active' : '';
		},
	},
    mounted() {
        this.$nextTick(() => {
            setTimeout(() => {
                this.$refs.modal.classList.add('active');
            }, 250);
        });
    },
    methods: {
        closeModal() {
            this.$refs.modal.classList.remove('active');
            setTimeout(() => {
                this.$emit('close');
            }, 400);
        },
    },
};
</script>

<style lang="scss">
.action-modal-outer {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 100;
    pointer-events: none;
    visibility: hidden;
}
.action-modal-overlay {
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0);
    @include transition-default;
}
.action-modal {
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
.active {
    &.action-modal-outer {
        pointer-events: all;
        visibility: visible;
    }
    .action-modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }
    .action-modal {
        transform: translate3d(10%, 0, 0);
    }
}
</style>
