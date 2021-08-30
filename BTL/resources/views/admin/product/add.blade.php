@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Add</li>
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
                    </div>
                    <div class="error" style="margin:20px"></div>
                    <form id="add-product" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Banner</label><br>
                                <input type="file" name="banner" id="">
                            </div>
                            <div class="form-group">
                                <label>Logo</label><br>
                                <input type="file" name="logo" id="">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Describe</label>
                                <input type="text" name="describe" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Content</label><br>
                                <textarea name="content" id="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Capacity</label>
                                <input type="text" name="capacity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Plastic Box</label>
                                <input type="text" name="plastic_box" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Concentration</label>
                                <input type="text" name="concentration" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Image</label><br>
                                <input type="file" name="image" id="">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Active status</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="0">Show</option>
                                    <option value="1">Hide</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('admin/product/list')}}" class="btn btn-secondary"
                                    style="margin: 0 0 20px 20px;">Cancel</a>
                                <button type="submit" class="btn btn-primary" style="margin: 0 0 20px 20px;">Add
                                    Product</button>
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
    $('#add-product').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#add-product')[0]);
        data.append('content', CKEDITOR.instances["content"].getData());
        $.ajax({
            url: "{{url('admin/product/add')}}",
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