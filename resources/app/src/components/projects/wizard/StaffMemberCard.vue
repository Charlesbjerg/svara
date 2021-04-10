<template>
    <article class="staff-card" :class="isMainUser">
        <figure v-if="hasAvatar" class="staff-card__avatar">
            <img :src="user.avatar" :alt="`Image of ${user.name}`" />
        </figure>
        <div class="staff-card__content">
            <h3 class="staff-card__name">{{ user.name }}</h3>
            <span class="staff-card__role">{{ user.jobRole }}</span>
        </div>
        <button v-if="deletable" type="button" class="staff-card__remove" aria-label="Remove staff member"
            @click="deleteItem">
            <i class="far fa-times-circle"></i>
        </button>
    </article>
</template>

<script>
export default {
    name: "StaffMemberCard",
    emits: ['deleted'],
    props: {
        user: {
            required: true,
            type: Object,
        },
        deletable: {
            required: false,
            type: Boolean,
        },
		mainUser: {
        	required: false,
			type: Boolean,
			default: false,
		}
    },
    computed: {
        hasAvatar() {
            return this.user.hasOwnProperty('avatar');
        },
		isMainUser() {
        	return 'staff-card--highlighted';
		}
    },
    methods: {
        deleteItem() {
            this.$emit('deleted');
        }
    }
}
</script>

<style lang="scss">
.staff-card {
    display: flex;
    align-items: center;
    padding: 20px;
    border-radius: $border-radius;
	background-color: #fff;
    @include box-shadow;
	&--highlighted {
		@include gradient-purple;
		color: #fff;
	}
    &__avatar {
        flex-basis: 80px;
        max-width: 80px;
        margin-right: 20px;
    }
    &__content {
        flex-grow: 1;
    }
    &__name {
        margin: 0 0 5px;
    }
    &__role {
        font-style: italic;
    }
    &__remove {
        flex-basis: 30px;
        max-width: 30px;
        margin-left: 20px;
        height: 30px;
        padding: 0;
        background-color: transparent;
        border: 0;
        cursor: pointer;
        i {
            font-size: $font-md;
            color: $accent-colour;
            transform-origin: center;
            @include transition-bounce;
        }
        &:hover i {
            color: $error-red;
            transform: rotate(180deg);
        }
    }
}
</style>
