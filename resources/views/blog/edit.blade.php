@extends('layouts.app')

@section('content')
<div class="container mt-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card register-box">
                <div class="card-header">{{ __('Create Post') }}</div>
                    <hr>
                <div class="card-body">
                    <form  method="post" action="{{route('update',$post->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control custom-form" name="title" required value="{{ $post->title }}" Placeholder="Title">
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <textarea name="body" id="" placeholder="Body" class="form-control custom-form">{{$post->body}}</textarea>
                            </div>
                        </div>
                        <!-- <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                            <input type="file" class="form-control custom-form" name="photo" required autocomplete="title" autofocus Placeholder="Title">
                            </div>
                        </div> -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary custom-button" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
