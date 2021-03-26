<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="box box-widget">
                    <blog-post></blog-post>
                    <comments :comments="comments"></comments>
                    <comment-form @commentAdded="updateCommentList"></comment-form>
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
                comments: []
            };
        },
        methods: {
            getComments() {
                CommentService.get()
                    .then(comments => {
                        this.comments = comments.data.comments;
                    })
                    .catch(error => {
                        console.log({error});
                    });
            },
            updateCommentList(comment) {
                console.log({comment});
                /*this.comments.forEach(item => {

                });*/

                if (comment.parentId === null) {
                    this.comments.unshift(comment);
                }
            }
        }
    }
</script>

<style scoped>

</style>
