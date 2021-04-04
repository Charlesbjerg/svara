<template>
    <div class="documents">
        <div class="documents__list">
            <ul class="documents__list-inner" v-if="documents.length > 0">
                <li class="document-list-item">
                    <i class="document-list-item__icon fas fa-file-word"></i>
                    <span class="document-list-item__meta">
                        <strong>example-word-doc.docx</strong>
                        04/01/21 - 13:20
                    </span>
                    <button @click="downloadFile()" aria-label="Download this file">
                        <i class="fas fa-file-download"></i>
                    </button>
                </li>
            </ul>
            <div class="documents__none" v-else>
                <span class="documents__none-msg">No Documents Found - Upload Some!</span>
            </div>
        </div>
        <aside class="documents__upload">
            <file-upload />
        </aside>
    </div>
</template>

<script>
import FileUpload from "./FileUpload";
export default {
    name: "documents",
    components: {FileUpload},
    data() {
        return {
            documents: [],
            loading: true,
        }
    },
    async mounted() {
        const response = await this.$api(`api/projects/pipeline/documents/${this.$route.params.id}`);
        this.documents = response.data;
    },
    methods: {
        downloadFile() {
            console.log("Open file in new tab?");
        }
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
}
</style>
