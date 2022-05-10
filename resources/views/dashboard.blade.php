{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


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
                    ('posts.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Post Title</label>
                          <input type="text" name="title" class="form-control"  placeholder="Enter Post Title" required>
                        </div>
                        <div class="form-group">
                            <label>Post Description</label>
                            <textarea class="form-control" placeholder="Enter Post Description" name="description" rows="10" required></textarea>
                          </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name='thumbnail'>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

