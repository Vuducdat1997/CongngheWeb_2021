@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">News Edit</li>
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
                    <form id="edit-news" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label>Categories</label>
                                <select name="categories" class="form-control custom-select">
                                    <option value="0">Parent</option>
                                    @foreach($categories as $categories)
                                    <option @if($categories->id == $news->categories_id)
                                        {{"selected"}}
                                        @endif

                                        value="{{$categories->id}}">{{$categories->name}}
                                    </option>
                                    @foreach($categories->parent as $cate_child)
                                    <option @if($cate_child->id == $news->categories_id)
                                        {{"selected"}}
                                        @endif value="{{$cate_child->id}}">&emsp;__{{$cate_child->name}}
                                    </option>
                                    @endforeach
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Title</label><br>
                                <input type="text" name="title" class="form-control" value="{{$news->title}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Describe</label><br>
                                <textarea name="desc" id="desc">{{$news->desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Details</label><br>
                                <textarea name="details" id="details">{{$news->details}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Image</label><br>
                                <input class="form-control" type="file" name="image"><br>
                                <img width="100px" height="50px" src="{{url('upload/news/'.$news->image)}}" alt="null">
                            </div>
                            <div class="form-group">
                                <label>Active status</label>
                                <select name="status" class="form-control custom-select">
                                    @if($news->status == 0)
                                    <option value="0" selected>Show</option>
                                    <option value="1">Hide</option>
                                    @else
                                    <option value="1" selected>Hide</option>
                                    <option value="0">Show</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Featured</label>
                                <select name="featured" class="form-control custom-select">
                                    @if($news->featured == 0)
                                    <option value="0" selected>Yes</option>
                                    <option value="1">No</option>
                                    @else
                                    <option value="1" selected>No</option>
                                    <option value="0">Yes</option>
                                    @endif
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('admin/news/list')}}" class="btn btn-secondary"
                                    style="margin: 0 0 20px 20px;">Cancel</a>
                                <button type="submit" class="btn btn-primary"
                                    style="margin: 0 0 20px 20px;">Save</button>
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
CKEDITOR.replace('desc');
CKEDITOR.replace('details');
$(document).ready(function() {
    $('#edit-news').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#edit-news')[0]);
        data.append('desc', CKEDITOR.instances["desc"].getData());
        data.append('details', CKEDITOR.instances["details"].getData());
        $.ajax({
            url: "{{url('admin/news/edit')}}" + "/{{$news->id}}",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                location.href = "{{url('admin/news/list')}}";
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