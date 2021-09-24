@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}
                        <a class="text-right" href="{{route('posts.create')}}">Add new</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>user</th>
                                    <th>image</th>
                                    <th>op</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($posts as $key=> $post)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{\Illuminate\Support\Str::limit($post->title, 50)}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td><img src="{{ $post->getFirstMediaUrl('images', 'thumb') }}"/></td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-info" href="{{route('posts.edit',$post->id)}}">edit</a>
                                            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{ __('No posts') }}
                                @endforelse
                                </tbody>

                            </table>

                        </div>
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


