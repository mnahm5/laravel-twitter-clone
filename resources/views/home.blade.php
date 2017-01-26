@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="timeline">
        <div class="col-md-4">
            <form action="#">
                <div class="form-group">
                    <textarea class="form-control" rows="5" maxlength="140" required placeholder="What are you up to?"></textarea>
                </div>
                <input type="submit" value="Post" class="form-control">
            </form>
        </div>
        <div class="col-md-8">
            Timeline
        </div>
    </div>
</div>
@endsection
