<template>
    <form class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-2">
            <input required type="text" v-model="replyName" placeholder="Your name...">
        </div>
        <div class="col-sm-8">
          <input required type="text" v-model="replyComment" class="col-sm-10"  placeholder="Your comment...">
        </div>
        <div class="col-sm-2">
          <button v-on:click="replyTo(comment, $event)" type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>

    </form>
</template>
<style>
</style>
<script>
    export default{
        props: ['comment'],
        data(){
            return{
                replyName: '',
                replyComment: ''
            }
        },
        methods:{
            replyTo(comment, event){
                if(this.replyName == "" || this.replyComment == "") {
                    alert("Please fill all form fields.");
                    return;
                }
                var that = this;
                $.post( "/comments", { name: this.replyName, comment: this.replyComment, parent:comment.id  } ).done(function( data ) {
                    that.replyName = '';
                    that.replyComment = '';
                    if (typeof that.comment.children == 'undefined') {
                        that.comment.children = [];
                    }
                    that.comment.children.push(data);
                    that.$parent.replyToComment = false;
                });

                if (event) event.preventDefault()
            }
        }
    }
</script>