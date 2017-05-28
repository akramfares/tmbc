<template>
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" v-bind:src="'https://unsplash.it/32/32?image=1'+comment.id">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ comment.name }}</h4>
            <p>{{ comment.comment }}</p>

            <a @click="replyToComment = comment">Reply</a>
            <comment-form v-if="replyToComment == comment" :comment="comment"></comment-form>

            <div class="clearfix"></div>
            <comment-list v-bind:comments="comment.children"></comment-list>
        </div>
    </div>
</template>

<script>
    import CommentList from './CommentList.vue';
    import CommentForm from './CommentForm.vue';
    export default{
        props: ['comment'],
        data(){
            return {
                replyToComment: false
            }
        },
        mounted(){
        },
        components: {
            'comment-list': CommentList,
            'comment-form': CommentForm
        }
    }
</script>