@extends('layouts.frontend')
@section('content')


<div class="card text-center mt-5 mb-5">
    <div class="card-header">
      <h3 class="card-title">{{$post->title}}</h3>
    </div>
    <div class="card-body">
      <p class="card-text">{{$post->description}}</p>
    </div>
    <img src="{{ url('thumbnails/' .  $post->thumbnail) }}" class="img-thumbnail mt-5" style=" display: block;
    margin-left: auto; margin-right: auto;" alt="Thumbnail" height="900" width=500>
    <div class="card-footer text-muted mt-5">
     Post By {{$post->user->name}} <br>
     Posted On {{date('y-m-d', strtotime($post->created_at))}}
    </div>
  </div>

@include('posts.comment') 
@endsection
