<template>
    <div>
        <div class="message-thread">
            <ul class="message-thread__messages" v-if="thread.messages">
                <li v-for="message in thread.messages" :key="message.id">
                    <message :message="message" />
                </li>
            </ul>
            <div class="message-thread__empty" v-else>
                No messages sent in this thread, send one!
            </div>
        </div>
        <message-field :threadId="thread.id" class="message-field" />
    </div>
</template>

<script>
import MessageField from "./MessageField";
import Message from "./Message";

export default {
    name: "Thread",
    components: {
        Message,
        MessageField,
    },
    computed: {
        thread() {
            return this.$store.state.projects.currentProject.selectedThread;
        }
    }
}
</script>

<style lang="scss">
.message-thread,
.message-field {
    padding: 20px;
    margin-bottom: 15px;
    border-radius: $border-radius;
    background-color: $light-grey;
}
.message-thread {
    &__messages {
        padding: 0;
        margin: 0;
        list-style-type: none;
    }
}
</style>
