<template>
    <section>
        <div class="box-comment">
            <img class="img-circle img-sm" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="User Image">
            <div class="comment-text">
                <span class="username">
                    {{ comment.username }}
                    <span class="text-muted pull-right">{{ new Date(parseInt(comment.createdAt) * 1000) }}</span>
                </span>
                {{ comment.message }}
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "CommentComponent",
        props: {
            comment: Object
        }
    }
</script>

<style scoped>

</style>
