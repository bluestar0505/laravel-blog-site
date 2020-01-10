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
    <h1 class="text-center m-5 font-weight-bold">Show {{$blog->title}}</h1>
    
    <div class="p-5 m-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Title : {{$blog->title}}</h2>
                </div>
                <div class="col pt-3">
                    <small class="float-right">Auth Name : {{$blog->auth_name}}</small>
                </div>
                <div class="col pt-3">
                    <small class="float-right">Created At : {{$blog->created_at}}</small>
                </div>
            </div>
            
            <h6 style="line-height:inherit">{{$blog->body}}</h6>

            @if ($blog->user_id == auth()->id() || $user_type == 'admin')
                <a class="mt-3 mr-5 float-right p-2 rounded btn btn-success" href="{{ route('edit-blog', ['blog'=>$blog->id]) }}">Edit</a>
                
                <button data-toggle="modal" data-target="#delete_modal_blog" class="mt-3 mr-2 float-right btn btn-danger p-2 rounded">Delete</button>
                
                <div class="modal fade" id="delete_modal_blog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">Do you want to delete this blog?</div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <form method="POST" action=" {{ route('delete-blog', ['blog'=>$blog->id]) }} ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="container pt-5">
                <h1 class="d-block border-bottom">COMMENTS</h1>
                @foreach ($comments as $comment)
                <div class="card mt-3">
                    <div class="card-header bg-info">
                        <span class="float-left">{{$comment->auth_name}}</span>
                        <span class="float-right  ml-4">{{$comment->created_at}}</span>
                    </div>

                    <div class="container">
                        <div class="p-4 m-3 border">
                            <h6 class="d-block" style="height:auto;">{{$comment->body}}</h6>
                            @if ($comment->auth_id == auth()->id() || $user_type == 'admin')
                                <button data-id="{{$comment->id}}" data-toggle="modal" data-target="#delete_modal" class="mt-3 mr-2 btn btn-danger p-2 rounded">Delete</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="modal fade modal-danger" id="delete_modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Delete</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">Do you want to delete selected comment?</div>
                          <div class="modal-footer">
                            <form action="{{ route('delete-comment-admin', ['comment'=>3]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="select_id" id="select_id"  value="">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-warning" id="delete_href">Delete</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('store-comment', ['blog_id'=>$blog->id]) }}">
                    @csrf
                    <input type="hidden" name="title" id="title" value="{{ $blog->title }}">
                    <label class="d-block" for="body">Message</label>
                    <textarea id="body" name="body" cols="30" rows="10" style="width:100%;" class="@error('body') border-danger @enderror">{{ old('body') ? old('body') : ''}}</textarea>
                    @error('body')
                        <small class="bg-warning">{{$message}}</small>
                    @enderror
                    <button class="d-block btn-primary mt-3 p-2 float-right rounded" type="submit">Send a comment</button>
                </form>
            </div>
            
        </div>
        

        
    </div>
    
    
@endsection