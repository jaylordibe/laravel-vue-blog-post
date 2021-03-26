<template>
    <section v-if="comment.id">
        <div class="box-comment">
            <img class="img-circle img-sm" src="https://img.icons8.com/color/36/000000/administrator-male.png"
                 alt="User Image">
            <div class="comment-text">
                <span class="username">
                    {{ comment.username }}
                    <span class="text-muted pull-right">{{ toLocalDateTime(comment.createdAt) }}</span>
                </span>
                {{ comment.message }}
            </div>

            <button type="button" v-if="comment.replies.comments.length" @click="viewReplies" class="btn btn-default btn-xs text-muted">
                View replies
            </button>

            <button type="button" @click="reply" class="btn btn-default btn-xs text-muted">
                Reply
            </button>

            <comments v-if="isRepliesSectionVisible" :comments="replies" class="pl-5"></comments>
            <comment-form v-if="isCommentFormVisible" :parentId="comment.id" @commentAdded="updateCommentList" class="pl-5"></comment-form>
        </div>
    </section>
</template>

<script>
    import {DateTime} from "luxon";
    import {CommentService} from "../services/comment.service";

    export default {
        name: "CommentComponent",
        props: {
            comment: Object
        },
        created() {
            // TODO: Add initialization here if needed...
        },
        data() {
            return {
                isCommentFormVisible: false,
                isRepliesSectionVisible: false,
                replies: {
                    comments: []
                }
            };
        },
        methods: {
            toLocalDateTime(date) {
                return DateTime.fromSeconds(date).toFormat('ff');
            },
            viewReplies() {
                this.isCommentFormVisible = true;
                const params = {
                    parentId: this.comment.id
                };

                CommentService.get(params)
                    .then(comments => {
                        this.replies = comments;
                        this.isRepliesSectionVisible = true;
                    })
                    .catch(error => {
                        console.log({error});
                    });
            },
            reply() {
                this.isCommentFormVisible = true;
            },
            updateCommentList(comment) {
                this.replies.comments.push(comment);
                this.isRepliesSectionVisible = true;
            }
        }
    }
</script>

<style scoped>

</style>
