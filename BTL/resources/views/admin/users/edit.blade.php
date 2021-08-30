@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    @if(session('loi'))
                    <div class="alert alert-danger">
                        <p>{{ session('loi') }}</p>
                    </div>
                    @endif
                    <div class="error" style="margin:20px"></div>
                    <form id="edit-users" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputRole">Role</label>
                                <select id="inputRole" name="role" class="form-control custom-select">
                                    @foreach($role as $role)
                                    <option @if($role->id == $users->role_id) selected @endif
                                        value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" value="{{$users->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="email" name="email" value="{{$users->email}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input type="password" name="password" value="{{$users->password}}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Retype Password</label>
                                <input type="password" name="retype" value="{{$users->password}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Photo</label><br>
                                <input class="form-control" type="file" name="photo"><br>
                                <img width="100px" height="50px" src="{{asset('upload/users')}}/{{$users->photo}}"
                                    alt=" null">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    @if($users->status == 0)
                                    <option value="0" selected>Kích hoạt</option>
                                    <option value="1">Chưa kích hoạt</option>
                                    @else
                                    <option value="1" selected>Chưa kích hoạt</option>
                                    <option value="0">Kích hoạt</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('admin/users/list')}}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <!-- <input type="submit" value="Add New Categories" class="btn btn-success"> -->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#edit-users').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#edit-users')[0]);
        // var data = $('#add-photos').serialize();
        $.ajax({
            url: "{{url('admin/users/edit')}}" + "/{{$users->id}}",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                location.href = "{{url('admin/users/list')}}";
            },
            error: function(response) {
                $('.error').html('');
                $.each(response.responseJSON.errors, function(key, value) {
                    $('.error').append(
                        '<span style="color:red">' +
                        value +
                        '</span><br>');
                });
            },
        });
    });
});
</script>
@endsection