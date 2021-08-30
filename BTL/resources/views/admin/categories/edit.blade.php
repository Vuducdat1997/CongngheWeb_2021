@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories Edit</li>
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
                    <form id="edit-categories" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$categories->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputMenu">Parent Categories</label>
                                <select id="inputMenu" name="parent" class="form-control custom-select">
                                    <option value="0">Parent</option>
                                    @foreach($categories_parent as $categories_parent)
                                    <option @if($categories->parent_id == $categories_parent->id)
                                        {{"selected"}}
                                        @endif

                                        value="{{$categories_parent->id}}">{{$categories_parent->name}}
                                    </option>
                                    @foreach($categories_parent->parent as $cate_child)
                                    <option value="{{$cate_child->id}}">&emsp;__{{$cate_child->name}}
                                    </option>
                                    @endforeach
                                    @endforeach
                                    <!-- <option value="0">Parent</option> -->

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Active status</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    @if($categories->status == 0)
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
                                <a href="{{url('admin/categories/list')}}" class="btn btn-secondary"
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
$(document).ready(function() {
    $('#edit-categories').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#edit-categories')[0]);
        $.ajax({
            url: "{{url('admin/categories/edit')}}" + "/{{$categories->id}}",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                location.href = "{{url('admin/categories/list')}}";
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