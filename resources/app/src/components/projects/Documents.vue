<template>
    <div class="project-documents">
        <h2>Project Documents</h2>
        <ul v-if="documentsLoaded" class="documents__list-inner">
           <li v-for="document in project.documents" :key="document.id">
                <document-item :document="document" />
           </li>
        </ul>
    </div>
</template>

<script>
import DocumentItem from "../common/DocumentItem";
export default {
    name: "Documents",
    components: {
        DocumentItem
    },
    data() {
        return {
            documentsLoaded: false,
        };
    },
    computed: {
        project() {
            return this.$store.state.projects.currentProject;
        },
    },
    async mounted() {
        console.log(this.$store.state.projects);
        const response = await this.$api(`api/projects/${this.project.id}/documents`);
        this.$store.commit('projects/setProjectDocuments', response.data);
        this.documentsLoaded = true;
    },
    methods: {

    }
}
</script>

<style lang="scss">
.documents {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    &__list,
    &__upload {
        padding: 20px;
        background-color: $light-grey;
        border-radius: $border-radius;
    }
    &__upload {
        height: 100%;
    }
    &__list-inner {
        padding: 0;
        margin: 0;
        list-style-type: none;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    &__none {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    &__none-msg {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: $font-md;
        font-family: $font-heading;
        opacity: 0.5;
        i {
            font-size: $font-lg;
            margin-bottom: 10px;
        }
    }
}
</style>
