@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="page-header">
                    <h1>
                        {{ $profile_user->name }}
                        <small> Since {{ $profile_user->created_at->diffForHumans() }}</small>
                    </h1>
                </div>

                @foreach($threads as $thread)

                    <div class="card">
                        <div class="card-header"> <h3 style="float: left;"><a href="{{$thread->path()}}">{{ $thread->title }}</a></h3>  <span style="float: right">{{ $thread->created_at->diffForHumans() }}</span></div>

                        <div class="card-body">

                            {{ $thread->body }}

                        </div>
                    </div>

                @endforeach

                {{ $threads->links() }}
            </div>
        </div>
    </div>

@endsection