new Vue({
    el: "#timeline",
    data: {
        post: ''
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
                }.bind(this),
                error: function () {
                    console.log('Error occurred');
                }
            });
        }
    }
});