<template>
    <article :class="`ps-member ${isLeadClass}`">
        <figure class="ps-member__avatar" v-if="member.avatar">
            <img :src="member.avatar" :alt="`Image of ${member.name}`"/>
        </figure>
        <div class="ps-member__initials" v-else>
            {{ initials }}
        </div>
        <div class="ps-member__info">
            <h3 class="ps-member__name">{{ member.name }}</h3>
            <p class="ps-member__role">{{ member.role }}</p>
            <span class="ps-member__lead" v-if="member.lead">Project Lead</span>
        </div>
    </article>
</template>

<script>
export default {
    name: "ProjectStaffMember",
    props: {
        member: {
            required: true,
            type: Object,
        }
    },
    computed: {
        initials() {
            return this.member.name[0];
        },
        isLeadClass() {
            return 'ps-member--lead';
        },
    },
}
</script>

<style lang="scss" scoped>
.ps-member {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-bottom: 15px;
    &:last-child {
        margin-bottom: 0;
    }
    > *:first-child {
        width: 50px;
        height: 50px;
        border-radius: $border-radius;
        margin-right: 15px;
    }
    &__initials {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: $font-md;
        font-family: $font-heading;
        @include gradient-purple;
    }
    &__name {
        margin: 0;
    }
    &__role {
        margin: 0;
    }
}
</style>
