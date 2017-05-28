<template>
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" v-bind:src="'https://unsplash.it/64/64?image=1'+comment.id">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ comment.name }}</h4>
            {{ comment.comment }}
        </div>
    </div>
</template>

<script>
    module.exports = {
        props: ['comment']
    };
</script>
