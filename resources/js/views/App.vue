<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="box box-widget">
                    <blog-post></blog-post>
                    <comment-form :parentId="0" @commentAdded="updateCommentList"></comment-form>
                    <comments :comments="comments"></comments>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {CommentService} from "../services/comment.service";

    export default {
        name: "App",
        created() {
            this.getComments();
        },
        data() {
            return {
                comments: {}
            };
        },
        methods: {
            getComments() {
                CommentService.get()
                    .then(comments => {
                        this.comments = comments;
                    })
                    .catch(error => {
                        console.log({error});
                    });
            },
            updateCommentList(comment) {
                if (comment.parentId === null) {
                    this.comments.data.comments.unshift(comment);
                }
            }
        }
    }
</script>

<style scoped>

</style>
