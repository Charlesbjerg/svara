<template>
    <div class="file-upload">
        <div class="dropzone js-dropzone-elem"></div>
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
                dictDefaultMessage: "<span class='dz-wrap'><i class='fas fa-file-upload'></i> Upload Files</span>",
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

<style lang="scss">
.dropzone {
    border-radius: $border-radius;
    border: 1px solid $grey;
    height: 100%;
    @include box-shadow-sm;
        display: flex;
        align-items: center;
        justify-content: center;

    .dz-message {
        height: 100%;
        margin: 0;
    }
}
.dz-wrap {
    font-family: $font-heading;
    display: flex;
    flex-direction: column;
    @include transition-default;
    i {
        font-size: 40px;
        margin-bottom: 10px;
        @include transition-bounce;
    }
}
.dropzone:hover {
    .dz-wrap {
        color: $accent-colour;
    }
    .dz-wrap i {
        transform: translate3d(0, -5px, 0);
    }
}
</style>
