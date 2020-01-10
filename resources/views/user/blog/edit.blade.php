@extends('user.layouts.main')


@section('title')
    Show
@endsection

@section('isadmin')
    @if ($user_type == 'admin')
        <a class="dropdown-item" href=" {{ route('admin') }}">
        Admin Panle
        </a>
    @endif
@endsection


@section('content')
    <h1 class="text-center  m-5 font-weight-bold">Show {{$blog->title}}</h1>
    

    <form method="POST" action="{{ route('update-blog', ['blog'=>$blog->id]) }}" class="m-lg-5">
        @csrf
        @method('PUT')
        <label for="title">Title</label><small class="float-right ">Created At : {{$blog->created_at}}</small><small class="float-right mr-4">Last Update : {{$blog->updated_at}}</small>
        <input type="text" name="title" id="title" class="border block" style="width:100%;" value="{{$blog->title}}" required>
        <br>
        <label class="d-block" for="body">Description</label>
        <textarea id="body" name="body" cols="30" rows="10" style="width:100%;" required>{{$blog->body}}</textarea>

        <button class="d-block btn-primary mt-3 p-2 float-right rounded" type="submit">Update</button>
    </form>
@endsection