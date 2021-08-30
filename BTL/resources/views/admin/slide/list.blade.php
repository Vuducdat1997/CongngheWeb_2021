@extends('admin.layout.index')

@section('title','danh sách slide')

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
                    <h1>Table Slide</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Slide</li>
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
                            <h3 class="card-title">List Slide</h3>
                            <button class="btn btn-success"><a href="{{url('admin/slides/add')}}">+ Add
                                    Slide</a></button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Edit, Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slides as $slides)
                                    <tr>
                                        <td>
                                            <img width="100px" , height="50px"
                                                src="{{asset('upload/slide')}}/{{$slides->image}}" alt="">
                                        </td>
                                        <td>
                                            @if($slides->status == 0)
                                            Show
                                            @else
                                            Hide
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{url('admin/slides/edit')}}/{{$slides->id}}">
                                                <i class="fas fa-pencil-alt" style="padding-right: 5px;">
                                                </i>
                                                Edit
                                            </a>
                                            <form style="display:inline;"
                                                action="{{url('admin/slides/delete')}}/{{$slides->id}}" method="post">
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
                                        <th>Image</th>
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