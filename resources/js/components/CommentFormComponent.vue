<template>
    <section>
        <div class="box-footer">
            <form @submit.prevent="addComment">
                <img class="img-fluid img-circle img-sm"
                     src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="Alt Text">
                <div class="img-push">
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="text" v-model="commentFormGroup.username" class="form-control input-sm"
                                   placeholder="Name">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" v-model="commentFormGroup.message" class="form-control input-sm"
                                   placeholder="Message">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
    import {CommentService} from "../services/comment.service";

    export default {
        name: "CommentFormComponent",
        data() {
            return {
                commentFormGroup: {
                    username: '',
                    message: ''
                }
            };
        },
        methods: {
            addComment() {
                if (!this.commentFormGroup.username.trim()) {
                    alert('User name is required.');
                    return;
                }

                if (!this.commentFormGroup.message.trim()) {
                    alert('Comment is required.');
                    return;
                }

                CommentService.create(this.commentFormGroup)
                    .then(comment => {
                        this.$emit('commentAdded', comment);
                        this.resetCommentFormGroup();
                    })
                    .catch(error => {
                        console.log({error});
                    });
            },
            resetCommentFormGroup() {
                this.commentFormGroup.username = '';
                this.commentFormGroup.message = '';
            }
        }
    }
</script>

<style scoped>

</style>
