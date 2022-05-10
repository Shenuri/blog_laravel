@extends('layouts.frontend')
@section('content')

<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
  <div class="col-md-6 px-0">
    <h1 class="display-4 font-italic">
      Machine Learning Hub
    </h1>
    <p class="lead my-3">
Welcome to Machine Learning Hub. Let's share our knowledge about machine learning and Data science
    </p>
    </p>
  </div>
</div>

<div class="row mb-2">

@foreach ($posts as $post )

<div class="col-md-6">
  <div class="card flex-md-row mb-4 box-shadow h-md-250">
    <div class="card-body d-flex flex-column align-items-start">
      <img src="{{ url('thumbnails/' .  $post->thumbnail) }}" class="img-thumbnail" alt="Thumbnail">
      <h3 class="mb-0">
        <a class="text-dark" href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
      </h3>
      <div class="mb-1 text-muted">{{date('y-m-d',strtotime($post->created_at))}}</div>
      <p class="card-text mb-auto">
       {{Str::limit($post->description,300)}}
      </p>
      <a href="{{route('posts.show',$post->id)}}">Continue reading</a>
    </div>
  </div>
</div>
    
@endforeach
  
  
</div>
</div>

@endsection