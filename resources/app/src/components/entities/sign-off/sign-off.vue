<template>
	<div class="sign-off">
		<aside class="sign-off__info panel">
			<h2>Sign Off</h2>
			<div v-if="signedOff">
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
			<h2>Sign Off Message</h2>
			<div v-if="signoff.message">
				{{ signoff.message }}
			</div>
			<div v-else>
				<h3>Compose a message or pick from a template.</h3>
				<button class="btn btn-default" @click="writeMessage">Write Message</button> or
				<button class="btn btn-default" @click="viewTemplates">Choose from Template</button>
			</div>
			<footer v-if="signedOff">
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
	},
	methods: {
    	async sendSignoff() {
    		const response = this.$api(`api/projects/pipeline/signoffs/${this.signoff.id}/dispatch`);
    		this.$store.commit('util/setGlobalNotif', 'Sign off email has been sent to the client!');
		},
		writeMessage() {

		},
		viewTemplates() {
    		this.showTemplateModal = true;
		},
		selectMessage(message) {
			this.name = message.name;
			this.message = message.message;
			this.closeTemplateModal();
		},
		closeTemplateModal() {
    		this.showTemplateModal = false;
		}
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
	&__notice {
		display: block;
		margin-bottom: 10px;
	}
	&__signature {
		margin: 0;
	}
}
</style>
