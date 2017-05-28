
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('comment', require('./components/Comment.vue'));


const app = new Vue({
    el: '#app',
    data: {
        comments: [],
        count: 0
    },
    methods: {
        submitComment: function () {
            if($("#inputName").val() == "" && $("#inputComment").val() == "")
                return;
            var that = this;
            $("#submitComment").prop("disabled", true);
            $.post( "/comments", { name: $("#inputName").val(), comment: $("#inputComment").val() } ).done(function( data ) {
                $("#inputName").val('');
                $("#inputComment").val('');
                that.comments.push(data);
                $("#submitComment").prop("disabled", false);
            });
        }
    },
    created: function () {
        var that = this;
        $.get( "/comments", function( data ) {
            that.comments = data;
            that.count = data.length;
        });
    }
});
