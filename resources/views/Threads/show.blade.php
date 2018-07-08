@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $thread->title }} </div>

                    <div class="card-body">

                        {{ $thread->body }}

                    </div>
                </div>


                <br>
                @php $replies = $thread->replies()->paginate(1); @endphp
                @foreach($replies as $reply)

                    <div class="card">
                        <div class="card-header"> {{ $reply->owner->name }}
                            said {{ $reply->created_at->diffForHumans() }}</div>

                        <div class="card-body">

                            {{ $reply->body }}

                        </div>

                    </div>

                @endforeach
                <br>
                {{ $replies->links() }}

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

            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-body">
                        <p>
                            This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="#"> {{ $thread->owner->name }}</a>, and currently has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies->count()) }}.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
