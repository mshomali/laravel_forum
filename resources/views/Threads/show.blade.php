@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $thread->title }} </div>

                    <div class="card-body">

                        {{ $thread->body }}

                    </div>
                </div>
            </div>
        </div>


        <br><br>
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach($thread->replies as $reply)

                    <div class="card">
                        <div class="card-header"> {{ $reply->owner->name }} said {{ $reply->created_at->diffForHumans() }}</div>

                        <div class="card-body">

                            {{ $reply->body }}

                        </div>

                    </div>

                @endforeach


            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(auth()->check())
                    <form action="{{ $thread->path() }}/addReply" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="body">Body: </label>
                            <textarea name="body" id="body" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
