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
                    <h1>Table Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Product</li>
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
                            <h3 class="card-title">List Product</h3>
                            <button class="btn btn-success"><a href="{{url('admin/product/add')}}">+ Add
                                    Product</a></button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Banner</th>
                                        <th>Logo</th>
                                        <th>Title</th>
                                        <th>Capacity</th>
                                        <th>Plastic Box</th>
                                        <th>Concentration</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Edit, Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <img width="50px" src="{{url('upload/product')}}/{{$product->banner}}"
                                                alt="">
                                        </td>
                                        <td>
                                            <img width="50px" src="{{url('upload/product')}}/{{$product->logo}}" alt="">
                                        </td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->capacity}}</td>
                                        <td>{{$product->plastic_box}}</td>
                                        <td>{{$product->concentration}}</td>
                                        <td>
                                            <img width="100px" height="100px"
                                                src="{{url('upload/product')}}/{{$product->image}}" alt="">
                                        </td>
                                        <td>@if($product->status == 0)
                                            Show
                                            @else
                                            Hide
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{url('admin/product/edit')}}/{{$product->id}}">
                                                <i class="fas fa-pencil-alt" style="padding-right: 5px;">
                                                </i>
                                                Edit
                                            </a>
                                            <form style="display:inline;"
                                                action="{{url('admin/product/delete')}}/{{$product->id}}" method="post">
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
                                        <th>Banner</th>
                                        <th>Logo</th>
                                        <th>Title</th>
                                        <th>Capacity</th>
                                        <th>Plastic Box</th>
                                        <th>Concentration</th>
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