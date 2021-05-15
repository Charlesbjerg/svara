<template>
    <aside class="new-thread">
        <header class="new-thread__head">
            <h2 class="new-thread__title">Create New Thread</h2>
            <button class="new-thread__close" @click="closeForm">
                <i class="fas fa-times"></i>
            </button>
        </header>
        <div class="fields">
            <div class="form-item">
                <label for="threadName">Thread Name</label>
                <input type="text" v-model="threadName" id="threadName" required />
            </div>
            <div class="form-item form-item--checkbox">
                <label for="addClient">
                    <input type="checkbox" v-model="addClient" id="addClient" />
                    Add the client to this thread
                </label>
            </div>
        </div>
        <button class="btn btn-default" @click="addThread">Add Thread</button>
    </aside>
</template>

<script>
export default {
    name: "NewThread",
    data() {
        return {
            threadName: '',
            addClient: false,
        }
    },
    computed: {
        project() {
            return this.$store.state.projects.currentProject;
        }
    },
    methods: {
        async addThread() {
            const response = await this.$api('api/projects/message-threads', 'POST', {
                title: this.threadName,
                shared_with_client: this.addClient,
                projectId: this.project.id,
            });
            response.data.messages = [];
            this.$store.commit('projects/addNewThread', response.data);
            this.closeForm();
            this.$emit('created', response.data);
        },
        closeForm() {
            this.threadName = '';
            this.addClient = false;
            this.$emit('close');
        }
    }
}
</script>

<style lang="scss">
.new-thread {
    padding: 20px;
    border-radius: $border-radius;
    background-color: $light-grey;
    &__head {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    &__close {
        @include gradient-red;
        border: 0;
        border-radius: $border-radius;
        width: 32px;
        height: 32px;
        color: #fff;
        cursor: pointer;
        @include box-shadow-sm;
        @include transition-default;
        i {
            transform-origin: center;
            @include transition-bounce;
        }
        &:hover {
            transform: rotate(-10deg);
        }
        &:hover i {
            transform: rotate(190deg);
        }
    }
}
</style>
