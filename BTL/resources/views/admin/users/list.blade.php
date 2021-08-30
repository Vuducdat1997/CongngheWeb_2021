@extends('admin.layout.index')
@section('content')
<style>
.content .card .card-header button a {
    color: #ffffff;

}

.content .card .card-header button {
    float: right;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Table Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Users</h3>
                            <button class="btn btn-success"><a href="{{url('admin/users/add')}}">+ Add
                                    Users</a></button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Edit, Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $users)
                                    <tr>
                                        <td>{{$users->name}}</td>
                                        <td>{{$users->email}}</td>
                                        <td>{{$users->rolename}}</td>
                                        <td>
                                            <img width="100px" src="{{url('upload/users')}}/{{$users->photo}}" alt="">
                                        </td>
                                        <td>
                                            @if($users->status == 1)
                                            Chưa kích hoạt
                                            @else
                                            Đã kích hoạt
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{url('admin/users/edit')}}/{{$users->id}}">
                                                <i class="fas fa-pencil-alt" style="padding-right: 5px;">
                                                </i>
                                                Edit
                                            </a>
                                            <form style="display:inline;"
                                                action="{{url('admin/users/delete')}}/{{$users->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"
                                                        style="padding-right: 5px;"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Edit, Delete</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection