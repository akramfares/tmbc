<h2 class="text-center">Comments</h2>
<div id="list-comments">
    <img src="{{ asset('img/loader.svg') }}" id="loader" class="center-block">
    <comment-list v-if="comments" :comments="comments"></comment-list>
</div>

<h2 class="text-center">Add your comment</h2>

<form action="#error-check" id="error-check">
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Your name..." required="true">
        <label for="inputComment">Comment</label>
        <textarea class="form-control" id="inputComment" rows="3" placeholder="Your comment..." required="true"></textarea>
    </div>
    <button v-on:click="submitComment" type="submit" class="btn btn-default" id="submitComment">Submit</button>
</form>