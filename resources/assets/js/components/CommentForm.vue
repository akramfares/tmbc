<template>
    <form class="form-horizontal" action="#error" id="error">
      <div class="form-group">
        <div class="col-sm-2">
            <input required type="text" v-model="replyName" placeholder="Your name...">
        </div>
        <div class="col-sm-8">
          <input required type="text" v-model="replyComment" class="col-sm-10"  placeholder="Your comment...">
        </div>
        <div class="col-sm-2">
          <button v-on:click="replyTo(comment)" type="submit" class="btn btn-default">Submit</button>
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
            replyTo(comment){
                if(this.replyName == "" && this.replyComment == "")
                                return;
                var that = this;
                $.post( "/comments", { name: this.replyName, comment: this.replyName, parent:comment.id  } ).done(function( data ) {
                    this.replyName = '';
                    this.replyComment = '';
                    //that.comments.push(data);
                });
            }
        }
    }
</script>