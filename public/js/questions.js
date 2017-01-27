new Vue({
    el: '#questions_form',
    data: {
        questions: ''
    },
    methods: {
        inputQuestions: function (e) {
            e.preventDefault();
            //console.log(this.questions);
            $.ajax({
                url: '/input/questions',
                type: 'post',
                dataType: 'json',
                data: {
                    'text': this.questions
                },
                success: function (data) {
                    console.log(data);
                },
                error: function () {
                    console.log('Error Occurred');
                }
            })
        }
    }
});