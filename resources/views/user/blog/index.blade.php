@extends('user.layouts.main')

@section('style')
    .vertical {
        display:flex;
        flex-wrap:wrap;
        width:100%;
    }
@endsection


@section('isadmin')
    @if ($user_type == 'admin')
        <a class="dropdown-item" href=" {{ route('admin') }}">
        Admin Panle
        </a>
    @endif
@endsection



@section('title')
    Blog
@endsection


@section('content')
    <h1 class="text-center m-5 font-weight-bold">Blog List</h1>
    @csrf
    <div class="container">
        @foreach ($blogs as $blog)
        <div class="card-1 mt-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h2>{{$blog->title}}</h2>
                    </div>
                    <div class="col pt-3">
                        <span class="float-right  ml-4">Created At : {{$blog->created_at}}</span><span class="float-right">Auth : {{$blog->auth_name}}</span>
                    </div>
                </div>
            </div>
            <div class="card-body d-block overflow-hidden" style="height:60px;">
                <h6>{{$blog->body}}</h6>

               
            </div>
            <a class="ml-4" href="{{ route('show-blog', ['blog'=>$blog->id]) }}">Show Detail</a>
        </div>
        @endforeach

        @if ($user_type != 'comment')
            <a class="mt-3 mr-5 float-right bg-success p-2 mb-5 rounded" href="{{ route('create-blog') }}">Create Blog</a>
        @endif
    </div>
@endsection