@extends('layouts.app')
@section('content')
<div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
    <div class="row">
       <div class="col-lg-7 col-md-10 col-sm-12">
         <div class="card register-box">
            <div class="card-body">
                <h3 class="text-center">{{ $post->title }}</h3>
                <hr>
                <div class="d-flex justify-content-between">
                    <span class="a-small">{{ $post->user->name }}</span> 
                    <span class="a-small">{{ $post->created_at->format('M D Y') }}</span> 
                    <span class="a-small">{{ $post->created_at->diffForHumans() }} </span>
                </div>
                <hr>
                <div class="overflow-section overflow-auto">
                    <p class="card-text">{{ $post->body}}</p>
                </div>
            </div>
                <hr>

            <div class="d-flex justify-content-between mb-2 px-3">
                    <span class="a-small"><a class="text-white" href="{{ route('postList') }}"><i class="fas fa-angle-double-left"></i> Back to list</a></span> 
                    <span class="a-small">
                        <a href="{{route('postEdit',$post->id)}}" class="text-white h5 px-3">
                            <i class="far fa-edit"></i> 
                        </a>
                        <a href="{{route('DeletePost',$post->id)}}" class="text-danger h5">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </span>
            </div>
          
       </div>
    </div>

    <div class="col-lg-5 col-md-12 col-sm-12">
        <div class="card comment-box">           
            <div class="card-body">    
                    <b>Comments ({{ count($post->comments) }})</b>
                        <hr>
                     <div class="overflow-auto overflow-section">
                         @foreach($post->comments as $comment)
                                <a href="{{route('DeleteComment',$comment->id)}}" class="close">
                                    &times;
                                </a>
                             &nbsp; {{ $comment->comment }}
                            <div class="d-flex justify-content-end a-small">
                                By &nbsp; <b>{{ $comment->user->name }}</b>/
                                   {{ $comment->created_at->diffForHumans() }} &nbsp; &nbsp;
                            </div>
                        <hr>
                        @endforeach
                      </div>                
                    @auth
                    <form action="{{ url('/comments/add') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="mb-3">
                                <textarea class="form-control" name="comment" Placeholder="Comment" required ></textarea>
                            </div>
                        <div class="row mb-2">
                            <div class="d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary custom-button" value="Comment">
                            </div>
                        </div>
                    </form>
                    @endauth
          </div>
        </div>
    </div>

    </div> 
</div>
@endsection
