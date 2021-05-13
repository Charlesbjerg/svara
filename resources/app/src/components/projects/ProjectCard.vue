<template>
    <article class="project-card">
        <router-link :to="projectUrl">
            <header class="project-card__top">
                <div class="project-card__client">
                    <img :src="projectClientLogo" :alt="projectClientLogoAlt" class="project-card__logo" v-if="hasLogo" />
					<span class="project-card__initials" v-else>{{ formatInitials(client.name) }}</span>
                    <span class="project-card__client-name">{{ client.name }}</span>
                </div>
                <div class="project-card__state">
                    <span class="state state--overdue">{{ state }}</span>
                </div>
            </header>
            <div class="project-card__body">
                <h2 class="project-card__name">{{ project.name }}</h2>
                <span class="project-card__phase" v-if="project.hasOwnProperty('currentPhase')">{{ project.currentPhase.name }}</span>
            </div>
            <footer class="project-card__bottom">
                <span class="project-card__completion" v-if="hasMeta">
                    {{ project.meta[0].key }}: {{ projectMeta }}
                </span>
                <div v-else></div>
                <div class="project-card__avatar"></div>
            </footer>
        </router-link>
    </article>
</template>

<script>
export default {
    name: "ProjectCard",
    props: {
        project: {
            type: Object,
            required: true,
        },
    },
    computed: {
        client() {
            return this.project.client;
        },
        state() {
            return this.project.state.state;
        },
        projectUrl() {
            return `/projects/${this.project.id}`;
        },
        projectClientLogo() {
            return `http://app.svara.io:8000/${this.project.client.logoPath}`;
        },
        projectClientLogoAlt() {
            return `Logo for ${this.client.name}`;
        },
		hasMeta() {
        	return this.project.hasOwnProperty('meta') && this.project.meta.length > 0 && this.project.meta[0].value !== "";
		},
        projectMeta() {
            if (this.project.meta[0].valueType === 'date') {
                return this.formattedDate(this.project.meta[0].value);
            } else {
				return this.project.meta[0].value;
			}
        },
		hasLogo() {
        	return this.project.client.logoPath !== "" && this.project.client.logoPath !== null;
		}
    },
    methods: {
        formattedDate(dateString) {
            const date = new Date(dateString);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
        },
		formatInitials(name) {
        	return name.charAt(0);
		}
    },
}
</script>

<style lang="scss">
.project-card {
    padding: 15px 20px;
    border: 1px solid $light-grey;
    @include box-shadow-sm;
    @include transition-bounce;
    &:hover {
        transform: translate3d(0, -3px, 0);
        @include box-shadow;
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
        width: 25px;
        height: 25px;
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
	&__initials {
		width: 25px;
		height: 25px;
		border-radius: $border-radius;
		@include gradient-purple;
		color: #fff;
		font-family: $font-heading;
		font-weight: $font-weight-heading;
		display: inline-block;
		margin-right: 10px;
		padding: 5px;
		text-align: center;
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
