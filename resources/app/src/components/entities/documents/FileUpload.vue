<template>
    <div class="file-upload">
        <div class="dropzone js-dropzone-elem">
        </div>
    </div>
</template>

<script>
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

export default {
    name: "FileUpload",
    data() {
        return {
            dropzone: null,
            options: {
                url: '/api/projects/pipeline/documents',
                thumbnailWidth: 150,
                maxFilesize: 15,
                dictDefaultMessage: "<i class='far fa-file-upload'></i> Upload Files",
                // headers: { "My-Awesome-Header": "header value" }
            }
        }
    },
    async mounted() {
        Dropzone.autoDiscover = false;
        this.$nextTick(() => {
            this.dropzone = new Dropzone('.js-dropzone-elem', this.options);
            this.dropzone.on('addedFile', this.filesAdded);
            this.dropzone.on('sending', this.addDataToFileRequest);
        });
    },
    methods: {
        addDataToFileRequest(file, xhr, formData) {
            // Add pipeline entity id
            formData.append('pipeline_entity_id', this.$route.params.id);
        },
        uploadComplete(file) {
            console.log("File uploaded!", file);
            // TODO: Set time out and hide/clear panel for file that has uploaded
        },
        updateProgress(file, progress, bytesSent) {
            // TODO: Update progress bar
            console.log(`Progress updated for ${file.name} - ${progress}%`)
        },
        filesAdded(files) {
            // TODO: If not an array, then only one file added
            console.log("Files added for upload", files);
        },
    }
}
</script>

<style scoped>

</style>
