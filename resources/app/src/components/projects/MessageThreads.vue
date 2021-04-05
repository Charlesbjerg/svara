<template>
    <div class="project-messages">
        <aside class="project-messages__threads">
            <div class="message-threads">
                <h2>Message Threads</h2>
                <ul v-if="threads.length > 0">
                    <li class="" v-for="thead in threads" :key="thread.id">
                        {{ thread.name }}
                    </li>
                </ul>
                <button class="btn btn-default" @click="newThread">New Thread</button>
            </div>
        </aside>
        <div class="project-messages__main">
            <ul class="message-thread" v-if="threadSelected">
                <li class="message" v-for="message in thread.messages" :key="message.id">
                    {{ message.message }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "MessageThreads",
    data() {
        return {
            threadSelected: false,
        };
    },
    computed: {
        threads() {
            return this.$store.state.project.currentProject;
        }
    },
    methods: {
        selectThread(thread) {
            this.threadSelected = thread;
        },
        newThread() {
            // TODO: Integrate method
        }
    }
}
</script>

<style lang="scss">
.project-messages {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 30px;
}
.message-thread,
.message-threads {
    background-color: $light-grey;
    padding: 20px;
    border-radius: $border-radius;
    @include box-shadow-sm;
}
</style>
