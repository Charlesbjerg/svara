<template>
    <div class="content-editor">
        <header class="content-editor__head">
            <h3>Respond to this thread</h3>
        </header>
        <editor
            class="content-editor__wrap"
            initialValue="Write your message here."
            apiKey="2jbjcyf0lfyi82ml1rcyh4ys7wfcidwxwmmi5cdl9xzoeuyc"
            v-model="message"
            :init="{
                height: 400,
                menubar: true,
                plugins: [
                    'advlist autolink lists link image charmap',
                    'searchreplace visualblocks code fullscreen',
                    'print preview anchor insertdatetime media',
                    'paste code help table'
                ],
                toolbar:
                    'formatselect | bold italic | \
                    bullist numlist | help'
            }">
        </editor>
        <div class="content-editor__controls">
            <button class="btn btn-default" @click="submitMessage">Send Message <i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'

export default {
    name: "MessageField",
    components: {
        Editor,
    },
    data() {
        return {
            message: '',
        };
    },
    computed: {
        thread() {
            return this.$store.state.projects.currentProject.selectedThread;
        },
    },
    methods: {
        async submitMessage() {
            const response = await this.$api('api/projects/message-threads/message', 'POST', {
               threadId: this.thread.id,
               message: this.message,
            });
            this.$store.commit('projects/addMessageToCurrentThread', response.data);
            this.message = '';
        }
    }
}
</script>

<style lang="scss">
.content-editor {
    &__head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
        h3 {
            margin: 0;
        }
    }
    textarea {
        display: block;
        width: 100%;
        background-color: #fff;
        height: 400px;
        opacity: 0.4;
    }
    &__controls {
        margin-top: 15px;
    }
}
</style>
