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

                @foreach($activities as $activity)

                    @include("Profiles.Activities." .  $activity->type)

                @endforeach

                {{--{{ $threads->links() }}--}}
            </div>
        </div>
    </div>

@endsection