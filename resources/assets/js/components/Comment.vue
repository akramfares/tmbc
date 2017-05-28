<template>
    <div class="media" v-bind:id="'comment-'+comment.id">
        <div class="media-left">
            <a href="#">
                <img class="media-object" v-bind:src="'https://unsplash.it/32/32?image=1'+comment.id">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ comment.name }}</h4>
            <p>{{ comment.comment }}</p>

            <p><a href="javascript:return false;" v-if="comment.level < 2" @click="replyToComment = comment">Reply</a> <i v-if="comment.level < 2">- </i><small><i>Created {{ moment(comment.updated_at, 'YYYY-MM-DD HH:mm:ss').fromNow() }}</i></small></p>
            <comment-form v-if="replyToComment == comment" :comment="comment"></comment-form>

            <div class="clearfix"></div>
            <comment-list v-bind:comments="comment.children"></comment-list>
        </div>
    </div>
</template>

<script>
    import CommentList from './CommentList.vue';
    import CommentForm from './CommentForm.vue';
    import moment from 'moment'

    export default{
        props: ['comment'],
        data(){
            return {
                replyToComment: false
            }
        },
        mounted(){
        },
        methods: {
          moment: function (date, format) {
            return moment(date, format);
          }
        },
        components: {
            'comment-list': CommentList,
            'comment-form': CommentForm
        }
    }
</script>