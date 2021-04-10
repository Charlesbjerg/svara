<template>
    <article class="client-card">
        <router-link :to="clientUrl">
            <div class="client-card__body">
                <div class="client-card__client">
                    <img :src="clientLogo" :alt="clientLogoAlt" class="client-card__logo" v-if="clientLogo"/>
                    <span class="client-card__logo logo-placeholder" v-else></span>
                </div>
                <div class="client-card__content">
                    <h2 class="client-card__name">{{ client.name }}</h2>
                    <span class="client-card__subtitle">{{ client.totalNumberProject }} projects in the pipeline</span>
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
        clientLogo() {
            return `http://app.svara.io:8000/${this.client.logoPath}`;
        },
        clientLogoAlt() {
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

    &__body {
        display: flex;
        align-items: center;
    }
    &__logo {
        border-radius: $border-radius;
        border: 2px solid $light-grey;
        width: 60px;
        height: 60px;
        object-fit: cover;
        object-position: center;
        margin-right: 10px;
    }
    &__name {
        font-size: $font-sm;
        margin-bottom: 5px;
    }
    &__subtitle {
        display: inline-block;
        margin-bottom: 0;
        font-size: $font-xs;
    }
}

.state {
    padding: 5px 15px;
    border-radius: 10px;
    color: #fff;
    font-size: $font-xxs;
    @include gradient-red;
}

.logo-placeholder {
    display: block;
    @include gradient-red;
}
</style>
