<template>
    <div class="company-index">
        <page-head title="Company Info"/>
        <div class="company-data">
            <section class="project-meta-outer">
                <h2>Project Metadata</h2>
                <p>The fields below allow you to setup the metadata that can be captured per project.</p>
                <div class="company-data__card">
                    <editable-meta-item v-for="(item, index) in metaItems"
										:key="index"
										:meta="item"
										:index="index"
										@update="updateMetaItem"
										@delete="removeItem" />
                    <hr style="margin: 20px 0;" v-if="metaItems.length > 0" />
                    <button class="btn btn-default" @click="addItem">
						Add meta item
						<i class="far fa-plus-square ml-5"></i>
					</button>
                </div>
            </section>
            <div class="control-groups">
				<section>
					<h2>User Control</h2>
					<p>Create, Delete or reset passwords for your existing users.</p>
					<div class="company-data__card">
						<div class="company-data__btn-group">
							<button @click="openModal('AddUser', 'Add a New User')" class="company-data__btn">
								<i class="fas fa-user-plus"></i>
								Add New User
							</button>
							<button @click="openModal('DeactivateUser', 'Deactivate a User')" class="company-data__btn">
								<i class="fas fa-user-times"></i>
								Deactivate User
							</button>
							<button @click="openModal('ResetPassword', 'Reset a User\'s Password')" class="company-data__btn">
								<i class="fas fa-user-cog"></i>
								Reset User's Password
							</button>
						</div>
					</div>
				</section>
				<section>
					<h2>Project Signoff Templates</h2>
					<p>Template messages that can be used when requesting sign off for a phase of the project from a client.</p>
					<div class="message-templates panel">
						<ul class="message-templates__list" v-if="templates">
							<li class="message-template" v-for="template in templates" :key="template.id">
								<span class="message-template__name">{{ template.name }}</span>
								<div class="message-template__actions">
									<button @click="editTemplate(template)" class="btn-action" aria-label="Edit Template">
										<i class="far fa-edit"></i>
									</button>
									<button @click="deleteTemplate(template)" class="btn-action btn-action--delete" aria-label="Delete Template">
										<i class="far fa-trash-alt"></i>
									</button>
								</div>
							</li>
						</ul>
						<button class="btn btn-default" @click="openNewTemplateModal">
							Add New Template
							<i class="far fa-plus-square ml-5"></i>
						</button>
					</div>
				</section>
			</div>
        </div>
        <action-modal v-if="modalActive" :component="modalComponent" :title="modalTitle" @close="closeModal" />
    </div>
</template>

<script>
import PageHead from "../../components/common/PageHead";
import EditableMetaItem from "../../components/company/EditableMetaItem";
import ActionModal from "../../components/company/ActionModal";

export default {
    components: {
        ActionModal,
        EditableMetaItem,
        PageHead,
    },
    data() {
        return {
            metaItems: [],
            modalActive: false,
            modalComponent: '',
            modalTitle: '',
			templates: [],
        }
    },
    async mounted() {
        const response = await this.$api('api/project-meta');
        this.metaItems = response.data;
        const templateResponse = await this.$api('api/projects/pipeline/signoffs/templates');
        this.templates = templateResponse.data;
    },
    methods: {
        addItem() {
            this.metaItems.push({
                name: 'Meta Item Name',
                sortable: 0,
                value_type: null,
            });
        },
		updateMetaItem(data) {
        	const index = this.metaItems.findIndex(item => item.id === data.id || item.id === null);
        	this.metaItems[index] = data;
        	console.log(data, this.metaItems[index]);
		},
        async removeItem(itemId) {
        	if (itemId) {
				const response = await this.$api(`api/project-meta/${itemId}`, 'DELETE');
				if (response.data.success) {
					const index = this.metaItems.findIndex(item => itemId === item.id);
					this.metaItems.splice(index, 1);
				}
        	// If no ID is present, remove the newly created but not saved meta item
			} else {
				const index = this.metaItems.findIndex(item => item.id === undefined);
				this.metaItems.splice(index, 1);
			}
        },
        openModal(component, modalTitle) {
            this.modalActive = true;
            this.modalComponent = component;
            this.modalTitle= modalTitle;
        },
        closeModal() {
            this.modalActive = false;
            this.modalComponent = '';
            this.modalTitle = '';
        },
		openNewTemplateModal() {
			this.$store.commit('entities/createBlankTemplate');
			this.openModal('MessageTemplate', 'View a Message Template')
		},
		editTemplate(template) {
			this.$store.commit('entities/updateTemplate', template);
			this.openModal('MessageTemplate', 'View a Message Template');
		},
		async deleteTemplate(template) {
			const response = await this.$api(`api/projects/pipeline/signoffs/templates/${template.id}`, 'DELETE');
			const index = this.templates.findIndex((item) => item.id === template.id);
			this.templates.splice(index, 1);
		},
    }
};
</script>

<style lang="scss">
.company-data {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 30px;
    &__card {
        padding: 20px;
        background-color: $light-grey;
        border-radius: $border-radius;
    }
    &__btn-group {
        display: flex;
        align-items: stretch;
        justify-content: space-between;
        margin: 0 -30px;
    }
    &__btn {
        height: auto;
        margin: 0 30px;
        flex: 1;
        padding: 30px;
        border-radius: $border-radius;
        background-color: #fff;
        font-family: $font-heading;
        font-weight: $font-weight-heading;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 0;
        cursor: pointer;
        @include box-shadow-sm;
        @include transition-default;
        i {
            font-size: 40px;
            margin: 0 0 15px;
        }
        &:hover {
            @include box-shadow;
            transform: translate3d(0, -2px, 0);
        }
    }
}
.control-groups {
	> * {
		margin-bottom: 30px;
	}
}
.message-templates {
	&__list {
		padding: 0;
		margin: 0;
		list-style-type: none;
	}
}
.message-template {
	padding: 10px;
	margin-bottom: 15px;
	border-radius: $border-radius;
	background-color: #fff;
	display: flex;
	align-items: center;
	justify-content: space-between;
	@include box-shadow-sm;
}
.btn-action {
	border: 2px solid $accent-colour;
	background-color: transparent;
	cursor: pointer;
	color: $accent-colour;
	border-radius: $border-radius;
	width: 32px;
	height: 30px;
	margin-left: 10px;
	@include transition-default;
	&:hover {
		background-color: $accent-colour;
		color: #fff;
	}
	&--delete {
		border-color: $error-red;
		color: $error-red;
	}
	&--delete:hover  {
		background-color: $error-red;
		color: #fff;
	}
}
</style>
