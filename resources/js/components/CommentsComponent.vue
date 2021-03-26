<template>
    <section v-if="comments.data">
        <div class="box-footer box-comments">
            <comment v-for="comment in comments.data.comments" :key="comment.id" :comment="comment"></comment>
            <button type="button" v-if="comments.meta.total > comments.data.comments.length" @click="loadMore" class="btn btn-default btn-xs text-muted">
                Load previous comments
            </button>
        </div>
    </section>
</template>

<script>
    import {CommentService} from "../services/comment.service";

    export default {
        name: "CommentsComponent",
        props: {
            comments: Object
        },
        data() {
            return {
                page: 1
            };
        },
        created() {
            // TODO: Add initialization here if needed...
        },
        methods: {
            loadMore() {
                const params = {
                    page: ++this.page
                };

                CommentService.get(params)
                    .then(comments => {
                        this.comments.data.comments = this.comments.data.comments.concat(comments.data.comments);
                        this.comments.link = comments.link;
                        this.comments.meta = comments.meta;
                    })
                    .catch(error => {
                        console.log({error});
                    });
            }
        }
    }
</script>

<style scoped>

</style>
