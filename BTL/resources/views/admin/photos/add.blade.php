@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Photos Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Photos Add</li>
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

                    @if(session('loi'))
                    <div class="alert alert-danger">
                        <p>{{ session('loi') }}</p>
                    </div>
                    @endif
                    <div class="error" style="margin:20px"></div>
                    <form id="add-photos" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Photogroups</label>
                                <select id="inputStatus" name="photogroups" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($photogroups as $photogroups)
                                    <option value="{{$photogroups->id}}">{{$photogroups->name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Image</label><br>
                                <input class="form-control" type="file" name="image"><br>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Describes</label><br>
                                <textarea name="describes" id="editor1"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('admin/photos/list')}}" class="btn btn-secondary"
                                    style="margin: 0 0 20px 20px;">Cancel</a>
                                <button type="submit" class="btn btn-primary addphoto"
                                    style="margin: 0 0 20px 20px;">Add New Photo</button>
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
    $('#add-photos').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#add-photos')[0]);
        data.append('describes', CKEDITOR.instances["editor1"].getData());
        $.ajax({
            url: "{{url('admin/photos/add')}}",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                location.href = "{{url('admin/photos/list')}}";
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