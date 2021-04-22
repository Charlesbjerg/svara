<template>
	<div class="sign-off">
		<aside class="sign-off__info panel">
			<h2>Sign Off</h2>
			<div v-if="signedOff.length > 0">
				<p>Phase has been signed off by the client on {{ $dateFormatter(signoff.signoffTimestamp) }}</p>
				<em class="sign-off__notice">See bottom of message for client signature</em>
			</div>
			<div v-else>
				<p>Currently awaiting sign off from client.</p>
				<em class="sign-off__notice">This project sign-off will be sent via email to the main contact assigned to the client.</em>
				<button class="btn btn-default" @click="sendSignoff">
					Send Sign-off to Client
					<i class="fas fa-envelope-open-text ml-10"></i>
				</button>
			</div>
		</aside>
		<section class="sign-off__message panel">
			<div>
				<input type="text" v-model="signoff.name" v-if="editName" @blur="updateName" />
				<h2 v-else @click="editName = true">{{ signoff.name }}</h2>
			</div>
			<div v-if="signoff.message">
				<div v-if="editMessage">
					<textarea class="sign-off__input" v-html="signoff.message" @blur="updateMessage"></textarea>
				</div>
				<div v-html="signoff.message" v-else @click="editMessage = true"></div>
			</div>
			<div v-else>
				<h3>Compose a message or pick from a template.</h3>
				<button class="btn btn-default" @click="writeMessage">Write Message</button> or
				<button class="btn btn-default" @click="viewTemplates">Choose from Template</button>
			</div>
			<footer v-if="signedOff.length > 0">
				<p>Signed off on {{ $dateFormatter(signoff.signoffTimestamp) }}</p>
				<figure class="sign-off__signature">
					<img :src="signoff.signature" alt="Client signature" />
				</figure>
			</footer>
		</section>
		<action-modal title="Select Message Template" v-if="showTemplateModal">
			<message-templates  @selected="selectMessage" />
		</action-modal>
	</div>
</template>

<script>
import ActionModal from "../../company/ActionModal";
import MessageTemplates from "./MessageTemplates";
export default {
    name: "sign-off",
	components: {MessageTemplates, ActionModal},
	props: {
    	data:{
    		type: Object,
			required: true,
		},
	},
	data() {
    	return {
    		signoff: {},
			showTemplateModal: false,
			editMessage: false,
			editName: false,
		};
	},
	computed: {
    	signedOff() {
    		return this.signoff.signoffTimestamp !== null;
		},
	},
	async mounted() {
    	const response = await this.$api(`api/projects/pipeline/signoffs/${this.$route.params.id}`);
    	this.signoff = response.data;
    	console.log(this.signoff);
	},
	methods: {
    	async sendSignoff() {
    		const response = this.$api(`api/projects/pipeline/signoffs/${this.signoff.id}/dispatch`);
    		this.$store.commit('util/setGlobalNotif', 'Sign off email has been sent to the client!');
		},
		async updateName(event) {
    		// Get data and revert fields back to text view
			this.signoff.name = event.target.value;
			this.editName = false;
			await this.update();
		},
		async updateMessage(event) {
			// Get data and revert fields back to text view
			this.signoff.message = event.target.value;
			this.editMessage = false;
			await this.update();
		},
		async update() {
			// If sign off doesn't exist create new
			let response;
			if (this.signoff.hasOwnProperty('id')) {
				response = await this.$api(`api/projects/pipeline/signoffs/${this.$route.params.id}`, 'PATCH', this.signoff);
			} else {
				response = await this.$api(`api/projects/pipeline/signoffs`, 'POST', {
					pipelineEntityId: this.$route.params.id,
					name: this.signoff.name,
					message: this.signoff.message,
				})
			}
			this.signoff = response.data;
		},
		viewTemplates() {
    		this.showTemplateModal = true;
		},
		selectMessage(message) {
			this.signoff.name = message.name;
			this.signoff.message = message.message;
			this.closeTemplateModal();
		},
		closeTemplateModal() {
    		this.showTemplateModal = false;
		},
		writeMessage() {
    		this.signoff.name = 'Message Title';
    		this.signoff.message = 'Add message';
		},
	}
}
</script>

<style lang="scss">
.sign-off {
	display: grid;
	grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
	gap: 30px;
	&__info {

	}
	&__message {

	}
	&__input {
		border-radius: $border-radius;
		width: 100%;
		min-height: 300px;
		padding: 20px;
	}
	&__notice {
		display: block;
		margin-bottom: 10px;
	}
	&__signature {
		margin: 0;
	}
}
</style>
