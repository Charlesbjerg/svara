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
                url: `/api/projects/pipeline/documents?pipeline_entity_id=${this.$route.params.id}`,
                thumbnailWidth: 150,
                maxFilesize: 15,
                dictDefaultMessage: "<span class='dz-wrap'><i class='fas fa-file-upload'></i> Upload Files</span>",
            }
        }
    },
    async mounted() {
        Dropzone.autoDiscover = false;
        await this.$nextTick(async () => {

			const self = this;

			// Setup all of the Dropzone event handlers in separate object so this can be accessed
			// as the component, not dropzone.
        	const eventHandlers = {
				init: function() {
					this.on("complete", function(file) {
						if (file.xhr.status === 200) {
							const response = JSON.parse(file.xhr.response);
							self.$emit('fileAdded', response.file);
							this.removeFile(file);
						}
					});
				}
			}

			// Concatenate options and event handlers when passing to Dropzone
            this.dropzone = new Dropzone('.js-dropzone-elem', Object.assign({}, this.options, eventHandlers));

        });
    },
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
