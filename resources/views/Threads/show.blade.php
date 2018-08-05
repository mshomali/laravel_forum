@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h3 style="float: left"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h3>

                        @can('update', $thread)
                            <form action="{{ $thread->path() }}" method="post" style="float: right;">
                                 @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">Delete Thread</button>
                            </form>
                        @endcan
                    </div>

                    <div class="card-body">

                        {{ $thread->body }}

                    </div>
                </div>


                <br>
                @php $replies = $thread->replies()->paginate(1); @endphp
                @foreach($replies as $reply)

                    <div class="card" id="reply-{{$reply->id}}">
                        <div class="card-header">
                            <h5 style="display: flex; flex: 1;">
                                <a href="{{ route('profile', $reply->owner->name) }}">
                                    {{ $reply->owner->name }}
                                </a> said {{ $reply->created_at->diffForHumans() }}
                            </h5>
                            <span style="float: right; margin-top: -30px; margin-right: 90px;">{{ $reply->Favorites()->count() }} {{ str_plural('favorite', $reply->Favorites()->count()) }}</span>
                            <form action="/replies/{{ $reply->id }}/favorites" method="post">
                                @csrf
                                <button type="submit" class="btn btn-default" style="float: right; margin-top: -37px;" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                                    Favorite
                                </button>
                            </form>
                        </div>


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
                            This thread was published {{ $thread->created_at->diffForHumans() }} by <a
                                    href="#"> {{ $thread->owner->name }}</a>, and currently
                            has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies->count()) }}.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
