@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users Add</li>
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

                        <!-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div> -->
                    </div>

                    @if(session('loi'))
                    <div class="alert alert-danger">
                        <p>{{ session('loi') }}</p>
                    </div>
                    @endif
                    <div class="error" style="margin:20px"></div>
                    <form id="add-users" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Role</label>
                                <select id="inputStatus" name="role" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Retype Password</label>
                                <input type="password" name="retype" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Photo</label><br>
                                <input class="form-control" type="file" name="photo"><br>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="0">Chưa kích hoạt</option>
                                    <option value="1">Kích hoạt</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('admin/users/list')}}" class="btn btn-secondary" style="margin: 0 0 20px 20px;">Cancel</a>
                                <button type="submit" class="btn btn-primary addphoto" style="margin: 0 0 20px 20px;">Add New Users</button>
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
    $('#add-users').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#add-users')[0]);
        $.ajax({
            url: "{{url('admin/users/add')}}",
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