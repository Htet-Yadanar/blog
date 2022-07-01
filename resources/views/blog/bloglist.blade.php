@extends('layouts.app')
@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row justify-content-center">
    @foreach ($data as $key => $value)
       <div class="col-lg-4 col-md-6 col-sm-11">
         <div class="card box">
             <p class="date-box">{{$value->created_at->Format('d F') }}</p>
            <div class="card-body mt-4">
                <h3 class="title text-center">{{ $value->title }}</h3>
                <div class="d-flex justify-content-end a-small">{{ $value->user->name}}</div>
                <p class="card-text">{{Str::limit($value->body, 148, $end='.......')}}</p>
            </div>
                <hr>
            <div class="d-flex justify-content-between">
             <span class="a-small">{{ $value->created_at->diffForHumans() }} </span>
             <a class="card-link custom-a a-small" href="{{route('postDetail',$value->id)}}"> Read More &raquo;

             <i class="fa-thin fa-alarm-clock"></i>
            </div>
            
         </a>
         </div>
       </div> 
       @endforeach
              <div class="d-flex justify-content-center pagination">
                    <!-- a Tag for previous page -->
                    <a href="{{$data->previousPageUrl()}}" class="num">
                    <!-- You can insert logo or text here --> Prev
                    </a>
                    @for($i=1;$i<=$data->lastPage();$i++)
                    <!-- a Tag for another page -->
                    <a href="{{$data->url($i)}}" class="num">{{$i}}</a>
                    @endfor
                    <!-- a Tag for next page -->
                    <a href="{{$data->nextPageUrl()}}" class="num">
                    <!-- You can insert logo or text here -->Next
                    </a>
              </div>
              
    </div>
    
</div>
@endsection
