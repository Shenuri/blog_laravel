@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form method="post" action="{{route
                    ('posts.update',$post->id)}}">
                        @csrf
                        <div class="form-group">
                          <label>Post Title</label>
                          <input type="text" name="title" class="form-control"  placeholder="Enter Post Title" value="{{$post->title}}"required>
                        </div>
                        <div class="form-group">
                            <label>Post Description</label>
                            <textarea class="form-control" placeholder="Enter Post Description" name="description" rows="10" required><?=$post->description?></textarea>
                          </div>

                    
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

