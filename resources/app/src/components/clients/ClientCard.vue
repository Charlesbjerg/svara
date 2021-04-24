<template>
    <article class="client-card">
        <router-link :to="clientUrl">
            <div class="client-card__body">
                <div class="client-card__client">
                    <img :src="clientLogo" :alt="clientLogoAlt" class="client-card__logo" v-if="hasClientLogo"/>
                    <span class="client-card__logo logo-placeholder" v-else>{{ initials }}</span>
                </div>
                <div class="client-card__content">
                    <h2 class="client-card__name">{{ client.name }}</h2>
                    <span class="client-card__subtitle">{{ client.totalProjects }} project(s) in the pipeline</span>
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
		hasClientLogo() {
        	return this.client.logoPath !== "" && this.client.logoPath !== null;
		},
        clientLogo() {
            return `http://app.svara.io:8000/${this.client.logoPath}`;
        },
        clientLogoAlt() {
            return `Logo for ${this.client.name}`;
        },
		initials() {
        	return this.client.name.charAt(0);
		},
		totalNumberProjects() {
        	return this.client.length;
		},
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
        //border: 2px solid $light-grey;
        width: 50px;
        height: 50px;
        object-fit: cover;
        object-position: center;
        margin-right: 10px;
		&.logo-placeholder {
			color: #fff;
			padding: 14px;
			text-align: center;
			font-family: $font-heading;
			font-weight: $font-weight-heading;
			font-size: 20px;
		}
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
    @include gradient-purple;
}
</style>
