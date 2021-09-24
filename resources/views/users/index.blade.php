@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}
                        <a class="text-right" href="{{route('posts.create')}}">Users</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $key=> $user)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$user->name}}</td>

                                        <td>{{$user->email}}</td>
                                        <td>{!! $user->id % 2 == 0 ? '<small class="text-primary">Odd</small>' : '<small class="text-success">Even</small>'!!}</td>
                                    </tr>
                                @empty
                                    {{ __('No posts') }}
                                @endforelse
                                </tbody>

                            </table>

                        </div>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


