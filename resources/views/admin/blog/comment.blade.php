@extends('admin.layouts.admin')

@section('comment')
    active
@endsection

@section('content')
@csrf
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Comment Table</h1>
</div>

<table class="table table-hover table-striped mt-2" width="100%">
    <tr>
        <th>#</th>
        <th>Blog Title</th>
        <th>Auth</th>
        <th>Create At</th>
        <th>Update At</th>
        <th>Action</th>
    </tr>
    @foreach ($comments as $comment)
    <tr>
        <td>{{$loop->index + 1}}</td>
        <td>{{$comment->title}}</td>
        <td>{{$comment->auth_name}}</td>
        <td>{{$comment->created_at}}</td>
        <td>{{$comment->updated_at}}</td>
        <td>
            <button class="btn btn-danger" data-id="{{$comment->id}}" data-toggle="modal" data-target="#delete_modal">DELETE</button>            
        </td>
    </tr>
    @endforeach
</table>
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
@endsection