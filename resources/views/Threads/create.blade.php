@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Create a new Thread </div>

                    <div class="card-body">
                        <div class="form-group">

                            <form action="/threads" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title: </label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="body">Body: </label>
                                    <textarea name="body" id="body" rows="8" class="form-control"></textarea>
                                </div>
                                <button class="btn-primary btn" type="submit">Publish</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
