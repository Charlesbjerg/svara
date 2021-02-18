<template>
    <article class="client-card">
        <router-link :to="clientUrl">
            <div class="client-card__body">
                <div class="client-card__client">
                    <img :src="clientLogo" :alt="clientLogoAlt" class="client-card__logo"/>
                </div>
                <div class="client-card__content">
                    <h2 class="client-card__name">{{ client.name }}</h2>
                    <span class="client-card__phase">{{ client.totalNumberProject }}</span>
                </div>
            </div>
        </router-link>
    </article>
</template>

<script>
export default {
    name: "ProjectCard",
    computed: {
        client() {
            return this.client.client;
        },
        state() {
            return this.client.state.state;
        },
        clientUrl() {
            return `/clients/${this.client.id}`;
        },
        clientClientLogo() {
            return `http://app.svara.io:8000/${this.client.client.logoPath}`;
        },
        clientClientLogoAlt() {
            return `Logo for ${this.client.name}`;
        }
    },
    props: {
        client: {
            type: Object,
            required: true,
        }
    }
}
</script>

<style lang="scss">
.client-card {
    padding: 15px 20px;
    border: 1px solid $light-grey;
    @include box-shadow;
    @include transition-bounce;
    &:hover {
        transform: translate3d(0, -5px, 0);
        @include box-shadow-hover;
    }
    &__top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    &__client {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    &__client-name {
        font-size: $font-xxs;
    }
    &__logo {
        border-radius: $border-radius;
        border: 2px solid $light-grey;
        width: 30px;
        height: 30px;
        object-fit: cover;
        object-position: center;
        margin-right: 10px;
    }
    &__name {
        font-size: $font-sm;
        margin-bottom: 0.3rem;
    }
    &__phase {
        display: inline-block;
        margin-bottom: 0.75rem;
        font-size: $font-xs;
    }
    &__bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    &__completion {
        font-size: $font-xs;
    }
    &__avatar {
        width: 30px;
        height: 30px;
        border-radius: $border-radius;
        border: 2px solid $light-grey;
        @include gradient-purple;
    }
}

.state {
    padding: 5px 15px;
    border-radius: 10px;
    color: #fff;
    font-size: $font-xxs;
    @include gradient-red;
}
</style>
