@extends('layouts.app')

@section('content')
    <div class="container" id="questions_form">
        <form action="#" v-on:submit="inputQuestions">
            <div class="form-group">
                <textarea class="form-control" rows="20" id="questions_input" v-model="questions"></textarea>
            </div>
            <input type="submit" value="Save" class="form-control">
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/questions.js') }}"></script>
@endsection