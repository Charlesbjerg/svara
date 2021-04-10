<template>
    <article class="task-card">
        <router-link :to="`/projects/entity/${task.board.pipelineEntityId}`">
            <h3>{{ task.name }}</h3>
            <p>Last updated on {{ $dateFormatter(task.updatedAt, false) }}</p>
            <p>From: {{ task.column.name }} in {{ task.board.name }}</p>
        </router-link>
    </article>
</template>

<script>
export default {
    name: "task-card",
    props: {
        task: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style lang="scss">
.task-card {
    padding: 15px 20px;
    border: 1px solid $light-grey;
    border-radius: $border-radius;
    @include box-shadow;
    @include transition-bounce;
    &:hover {
        transform: translate3d(0, -5px, 0);
        @include box-shadow-hover;
    }
}
</style>
