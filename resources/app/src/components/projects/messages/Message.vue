<template>
    <article class="message">
        <header class="message__head">
            <project-staff-member :member="message.postedBy" />
            <em>{{ formattedDate(message.createdAt) }}</em>
        </header>
        <div class="message__body" v-html="message.message"></div>
    </article>
</template>

<script>
import ProjectStaffMember from "../overview/ProjectStaffMember";
export default {
    name: "Message",
    components: {ProjectStaffMember},
    props: {
        message: {
            type: Object,
            required: true,
        }
    },
    mounted() {
        console.log(this.message);
    },
    methods: {
        formattedDate(dateString) {
            const date = new Date(dateString);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} - ${date.getHours()}:${date.getMinutes()}`;
        },
    }
}
</script>

<style lang="scss">
.message {
    display: block;
    width: 100%;
    padding: 20px;
    border-radius: $border-radius;
    margin-bottom: 15px;
    background-color: #fff;
    @include box-shadow-sm;
    &__head {
        margin-bottom: 15px;
        > *:first-child {
            border-bottom: 1px solid rgba($grey, 0.25);
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
    }
}
</style>
