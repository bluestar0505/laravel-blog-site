@extends('user.layouts.main')


@section('title')
    Create
@endsection

@section('isadmin')
    @if ($user_type == 'admin')
        <a class="dropdown-item" href=" {{ route('admin') }}">
        Admin Panle
        </a>
    @endif
@endsection


@section('content')
    <h1 class="text-center m-5 font-weight-bold">Create Blogs</h1>

    <form method="POST" action="{{ route('store-blog') }}" class="m-lg-5">
        @csrf
        <label for="title" class="d-block">Title</label>
        <input type="text" name="title" id="title" class="border block @error('title') border-danger @enderror" style="width:100%;" value="{{ old('title') ? old('title') : ''}}">
        @error('title')
            <small class="bg-warning">{{$message}}</small>
        @enderror
        <br>
        <label class="d-block" for="body">Description</label>
        <textarea id="body" name="body" cols="30" rows="10" style="width:100%;" class="@error('body') border-danger @enderror">{{ old('body') ? old('body') : ''}}</textarea>
        @error('body')
            <small class="bg-warning">{{$message}}</small>
        @enderror
        <button class="d-block btn-primary mt-3 p-2 float-right rounded" type="submit">Save</button>
    </form>

@endsection