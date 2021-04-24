<template>
    <div class="project-messages">
        <aside class="project-messages__threads">
            <div class="message-threads">
                <h2>Message Threads</h2>
                <ul v-if="threads.length > 0" class="message-threads__list">
                    <li class="message-threads__item" v-for="thread in threads" :key="thread.id" @click="selectThread(thread, $event)">
                        <span class="message-threads__title">{{ thread.title }}</span>
                        <em>{{ formattedDate(thread.updatedAt) }}</em>
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
            <new-thread v-else-if="creatingNewThread" @close="creatingNewThread = false; " />
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
