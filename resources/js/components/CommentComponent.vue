<template>
    <section>
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
                <i class="fa fa-share"></i> View replies
            </button>
            <comments v-if="isRepliesSectionVisible" :comments="comment.replies.comments"></comments>

            <button type="button" @click="reply" class="btn btn-default btn-xs text-muted">
                <i class="fa fa-thumbs-o-up"></i> Reply
            </button>
            <comment-form v-if="isCommentFormVisible" :parentId="comment.id" @commentAdded="updateCommentList"></comment-form>
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
        data() {
            return {
                isCommentFormVisible: false,
                isRepliesSectionVisible: false
            };
        },
        methods: {
            toLocalDateTime(date) {
                return DateTime.fromSeconds(date).toFormat('ff');
            },
            viewReplies() {
                const params = {
                    parentId: this.comment.id
                };

                CommentService.get(params)
                    .then(comments => {
                        this.comment.replies.comments = comments.data.comments;
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
                this.comment.replies.push(comment);
            }
        }
    }
</script>

<style scoped>

</style>
