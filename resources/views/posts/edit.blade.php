@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts create') }}</div>

                    <div class="card-body">
                        <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">

                                <div class="mb-3">
                                    <label for="title">title </label>
                                    <input type="text" name="title"  class="form-control"  placeholder="Post title" value="{{$post->title}}">
                                    @if($errors->has('title'))
                                        <small class="text-danger">{{$errors->first('title')}}</small>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="mb-3">
                                    <label for="body">body </label>
                                    <textarea name="body" class="form-control">{{$post->body}}</textarea>
                                    @if($errors->has('body'))
                                        <small class="text-danger">{{$errors->first('body')}}</small>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <img src="{{ $post->getFirstMediaUrl('images', 'thumb') }}"/>
                                <div class="mb-3">
                                    <label for="image">image </label>
                                    <input type="file" name="image" class="form-control">
                                    @if($errors->has('image'))
                                        <small class="text-danger">{{$errors->first('image')}}</small>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


