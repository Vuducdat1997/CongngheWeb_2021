@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
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
                    <div class="error" style="margin:20px"></div>
                    <form id="edit-products" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Banner</label><br>
                                <input type="file" name="banner" id=""><br><br>
                                <img width="100px" height="50px" src="{{url('upload/product/'.$products->banner)}}"
                                    alt="null">
                            </div>
                            <div class="form-group">
                                <label>Logo</label><br>
                                <input type="file" name="logo" id=""><br><br>
                                <img width="100px" height="50px" src="{{url('upload/product/'.$products->logo)}}"
                                    alt="null">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$products->title}}">
                            </div>
                            <div class="form-group">
                                <label>Describe</label>
                                <input type="text" name="describe" class="form-control" value="{{$products->describe}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Content</label><br>
                                <textarea name="content" id="content">{{$products->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Capacity</label>
                                <input type="text" name="capacity" class="form-control" value="{{$products->capacity}}">
                            </div>
                            <div class="form-group">
                                <label>Plastic Box</label>
                                <input type="text" name="plastic_box" class="form-control"
                                    value="{{$products->plastic_box}}">
                            </div>
                            <div class="form-group">
                                <label>Concentration</label>
                                <input type="text" name="concentration" class="form-control"
                                    value="{{$products->concentration}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Image</label><br>
                                <input type="file" name="image" id=""><br><br>
                                <img width="100px" height="50px" src="{{url('upload/product/'.$products->image)}}"
                                    alt="null">
                            </div>
                            <div class="form-group">
                                <label>Active status</label>
                                <select name="status" class="form-control custom-select">
                                    @if($products->status == 0)
                                    <option value="0" selected>Show</option>
                                    <option value="1">Hide</option>
                                    @else
                                    <option value="1" selected>Hide</option>
                                    <option value="0">Show</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('admin/product/list')}}" class="btn btn-secondary"
                                    style="margin: 0 0 1% 1.5%;">Cancel</a>
                                <button type="submit" class="btn btn-primary" style="margin: 0 0 1% 1.5%;">Save
                                    Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    </form>
    <!-- /.content -->
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace('content');

$(document).ready(function() {
    $('#edit-products').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#edit-products')[0]);
        data.append('content', CKEDITOR.instances["content"].getData());

        $.ajax({
            url: "{{url('admin/product/edit')}}" + "/{{$products->id}}",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                location.href = "{{url('admin/product/list')}}";
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