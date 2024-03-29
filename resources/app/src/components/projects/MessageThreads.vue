<template>
    <div class="project-messages">
        <aside class="project-messages__threads">
            <div class="message-threads">
                <h2>Message Threads</h2>
                <ul v-if="threads.length > 0" class="message-threads__list">
                    <li v-for="thread in threads" :key="thread.id" @click="selectThread(thread, $event)">
                        <div class="message-threads__item" v-if="canAccess(thread)">
							<div class="message-threads__content">
								<span class="message-threads__title">{{ thread.title }}</span>
								<em>{{ formattedDate(thread.updatedAt) }}</em>
							</div>
							<span class="message-threads__count">
								{{ thread.messageCount }}
								<i class="far fa-comments ml-5"></i>
							</span>
						</div>
                    </li>
                </ul>
                <button class="btn btn-default btn-block" @click="creatingNewThread = true; selectedThread = false;">
                    Create New Thread
                    <i class="fas fa-comments ml-5"></i>
                </button>
            </div>
        </aside>
        <div class="project-messages__main">
            <div class="message-thread-outer" v-if="selectedThread">
                <thread />
            </div>
            <new-thread v-else-if="creatingNewThread" @close="creatingNewThread = false;" @created="selectNewThread" />
            <div class="message-thread-none" v-else>
                <i class="fas fa-comments"></i>
                <h3>Select a Message Thread</h3>
            </div>
        </div>
    </div>
</template>

<script>
import MessageField from "./messages/MessageField";
import Thread from "./messages/Thread";
import NewThread from "./messages/NewThread";

export default {
    name: "MessageThreads",
    components: {
        NewThread,
        Thread,
        MessageField
    },
    data() {
        return {
            creatingNewThread: false
        };
    },
    computed: {
        threads() {
            return this.$store.state.projects.currentProject.messageThreads ?? [];
        },
        selectedThread: {
            get() {
                return this.$store.state.projects.currentProject.selectedThread ?? null;
            },
            set(value) {
                return this.$store.state.projects.currentProject.selectedThread = value;
            }
        },
		user() {
        	return this.$store.state.auth.user;
		}
    },
    methods: {
        async selectThread(thread, event) {
            document.querySelectorAll('.message-threads__item.active').forEach(elem => elem.classList.remove('active'));
            event.target.classList.add('active');
            const response =  await this.$api(`api/projects/message-threads/${thread.id}`);
            this.$store.commit('projects/setSelectedThread', response.data)
        },
        formattedDate(dateString) {
            const date = new Date(dateString);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} - ${date.getHours()}:${date.getMinutes()}`;
        },
		canAccess(thread) {
        	return this.user.typeId != 3 || (this.user.typeId === 3 && thread.sharedWithClient);
		},
		selectNewThread(newThread) {
			this.$store.commit('projects/setSelectedThread', newThread)
		}
    }
}
</script>

<style lang="scss">
.project-messages {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
    gap: 30px;
}
.message-threads {
    background-color: $light-grey;
    padding: 20px;
    border-radius: $border-radius;
    @include box-shadow-sm;
}
.message-threads {
    &__list {
        list-style-type: none;
        padding: 0;
        margin: 0 0 15px;
    }
    &__item {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: $border-radius;
        background-color: #fff;
        border: 2px solid #fff;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: space-between;
        @include box-shadow-sm;
        @include transition-default;
        &.active {
            border-color: $accent-colour;
        }
        &:hover {
            transform: translate3d(-2px, -2px, 0);
            @include box-shadow;
        }
    }
    &__title {
        font-family: $font-heading;
        font-weight: $font-weight-heading;
        display: block;
        margin-bottom: 5px;
    }
	&__count {
		flex-basis: 75px;
		max-width: 75px;
		margin-left: 10px;
		display: block;
		border-radius: $border-radius;
		padding: 10px;
		color: #fff;
		font-family: $font-heading;
		font-size: $font-sm;
		text-align: center;
		@include gradient-purple;
	}
}
.message-thread-none {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    padding: 20px;
    border-radius: $border-radius;
    background-color: $light-grey;
    i {
        font-size: 40px;
        margin-bottom: 10px;
    }
}
</style>
