@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settings Edit</li>
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
                    <form id="edit-settings" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Site Name:</label>
                                        <input type="text" name="name" value="{{$settings->name}}"
                                            class="form-control"><br>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Logo:</label><br>
                                        <input class="form-control" type="file" name="logo"><br>
                                        <img width="100px" height="50px"
                                            src="{{asset('upload/settings')}}/{{$settings->logo}}" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label>Site favicon:</label><br>
                                        <input class="form-control" type="file" name="favicon"><br>
                                        <img width="100px" height="50px"
                                            src="{{asset('upload/settings')}}/{{$settings->favicon}}" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" name="email" value="{{$settings->mail}}"
                                            class="form-control"><br>
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook:</label>
                                        <input type="text" name="facebook" value="{{$settings->facebook}}"
                                            class="form-control"><br>
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube:</label>
                                        <input type="text" name="youtube" value="{{$settings->youtube}}"
                                            class="form-control"><br>
                                    </div>
                                    <div class="form-group">
                                        <label>Zalo:</label>
                                        <input type="text" name="zalo" value="{{$settings->zalo}}"
                                            class="form-control"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Save Setting</button>
                                </div>
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
    $('#edit-settings').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#edit-settings')[0]);
        $.ajax({
            url: "{{url('admin/settings/edit')}}" + "/{{$settings->id}}",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                location.href = "{{url('admin/settings/edit/1')}}";
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