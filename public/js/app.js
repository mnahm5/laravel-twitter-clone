new Vue({
    el: "#timeline",
    data: {
        post: '',
        posts: [],
        limit: 2,
        total: 0
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
                    console.log(data.user.profileUrl);
                    this.post = '';
                    this.posts.unshift(data);
                }.bind(this),
                error: function () {
                    console.log('Error occurred');
                }
            });
        },
        getPosts: function () {
            $.ajax({
                url: '/posts',
                dataType: 'json',
                type: 'get',
                data: {
                    limit: this.limit
                },
                success: function (data) {
                    this.posts = data.posts;
                    this.total = data.total;
                }.bind(this)
            });
        },
        getMorePosts: function (e) {
            e.preventDefault();
            this.limit += this.limit;
            this.getPosts();
        }
    },
    mounted: function () {
        this.getPosts();
        setInterval(function () {
            this.getPosts();
        }.bind(this), 10000);
    }
});