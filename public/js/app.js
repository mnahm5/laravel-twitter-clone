new Vue({
    el: "#timeline",
    data: {
        post: '',
        posts: []
    },
    methods: {
        postStatus: function (e) {
            e.preventDefault();
            $.ajax({
                url: '/posts',
                type: 'post',
                dataType: 'json',
                data: {
                    'body': this.post
                },
                success: function (data) {
                    console.log(data);
                    this.post = '';
                    this.posts.unshift(data);
                }.bind(this),
                error: function () {
                    console.log('Error occurred');
                }
            });
        }
    }
});