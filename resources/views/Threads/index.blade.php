@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Forum Threads</div>

                    <div class="card-body">

                        @foreach($threads as $thread)

                            <article>
                                <div class="level" style="display: flex; align-items: center;">

                                    <h4 style="flex: 1">
                                        <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                                    </h4>
                                    <strong>{{ $thread->replies->count() }} {{ str_plural('reply', $thread->replies->count()) }}</strong>
                                </div>
                                <div class="body">{{ $thread->body }}</div>


                            </article>
                            <hr>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
