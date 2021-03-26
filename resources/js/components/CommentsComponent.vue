<template>
    <section>
        <div class="box-footer box-comments">
            <comment v-for="comment in comments" :key="comment.id" :comment="comment"></comment>
        </div>
    </section>
</template>

<script>
    export default {
        name: "CommentsComponent",
        props: {
            comments: Array
        }
    }
</script>

<style scoped>

</style>
