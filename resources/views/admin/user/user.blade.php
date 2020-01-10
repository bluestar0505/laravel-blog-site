@extends('admin.layouts.admin')

@section('user')
    active
@endsection

@section('content')
    @csrf
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">User Table</h1>
    </div>

    <table class="table table-hover table-striped mt-2" width="100%">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Create At</th>
            <th>Update At</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->user_type}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>
            @if ($loop->index != 0)
            <button class="btn btn-danger" data-id="{{$user->id}}" data-toggle="modal" data-target="#delete_modal">DELETE</button>
            @endif
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
              <div class="modal-body">Do you want to delete selected user?</div>
              <div class="modal-footer">
                <form action="{{ route('delete-user-admin', ['user'=>3]) }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="select_id" id="select_id" value="">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-warning" id="delete_href">Delete</button>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection