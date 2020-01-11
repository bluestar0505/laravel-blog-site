@extends('admin.layouts.admin')

@section('dashboard')
    active
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="container bg-white mt-5">
        <div class="row">
            <div class="rounded-circle col m-4 p-5 text-center hover-zoom-effect" style="background-color: lime">
                <h2>Users</h2><br>
                <h4>{{ $user_count }}</h4>
            </div>
            <div class="rounded-circle col m-4 p-5 text-center" style="background-color: mediumslateblue">
                <h2>Blogs</h2><br>
                <h4>{{ $blogs->count() }}</h4>
            </div>
            <div class="rounded-circle col m-4 p-5 text-center" style="background-color: orange">
                <h2>Comments</h2><br>
                <h4>{{ $comment_count }}</h4>
            </div>
        </div>

        <h1 class="mt-5 text-center">Recent Blog</h1>
        @if ($blogs->count() != 0)
            <div class="card-1 mt-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2>{{$blogs[0]->title}}</h2>
                        </div>
                        <div class="col pt-3">
                            <span class="float-right  ml-4">Created At : {{$blogs[0]->created_at}}</span><span class="float-right">Auth : {{$blogs[0]->auth_name}}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6>{{$blogs[0]->body}}</h6>
                </div>
            </div>
        @endif
    </div>
@endsection
