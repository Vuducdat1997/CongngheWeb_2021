@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Menu Edit</li>
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
                    <form id="edit-menu" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" value="{{$menus->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control custom-select select-type">
                                    @if($menus->type == 'category')
                                    <option class="type-category" value="category" selected>Category</option>
                                    <option class="type-news" value="news">News</option>
                                    @else
                                    <option class="type-category" value="category">Category</option>
                                    <option class="type-news" value="news" selected>News</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Page</label>
                                <select name="page" class="form-control custom-select select-page">
                                    <option selected disabled>Select one</option>
                                    @foreach($category as $cate)
                                    <option class="cate" @if($cate->id == $menus->page_id) {{"selected"}} @endif
                                        value="{{$cate->id}}">{{$cate->name}}</option>
                                    @foreach($cate->new as $news)
                                    <option class="new" @if($news->id == $menus->page_id) {{"selected"}} @endif
                                        value="{{$news->id}}">&emsp;--{!! $news->title !!}</option>
                                    @endforeach
                                    @foreach($cate->parent as $cateChild)
                                    <option class="cate" @if($cateChild->id == $menus->page_id) {{"selected"}} @endif
                                        value="{{$cateChild->id}}">&emsp;__{{$cateChild->name}}</option>
                                    @foreach($cateChild->new as $news)
                                    <option class="new" @if($news->id == $menus->page_id) {{"selected"}} @endif
                                        value="{{$news->id}}">&emsp;&emsp;--{!! $news->title !!}</option>
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">URL</label>
                                <input type="text" name="url" value="{{$menus->menu_url}}" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Menu Order</label>
                                <input type="text" name="order" value="{{$menus->menu_order}}" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputMenu">Select parent Menu</label>
                                <select id="inputMenu" name="parent" class="form-control custom-select">
                                    <option value="0">Parent</option>
                                    @foreach($menuparent as $menuparent)
                                    <option @if($menuparent->id == $menus->parent_id) {{"selected"}} @endif
                                        value="{{$menuparent->id}}">{{$menuparent->name}}</option>
                                    @foreach($menuparent->menuchildrent as $menu_child)
                                    <option value="{{$menu_child->id}}">&emsp;__{{$menu_child->name}}
                                    </option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('admin/menus/list')}}" class="btn btn-secondary"
                                    style="margin: 0 0 1% 1.5%;">Cancel</a>
                                <button type="submit" class="btn btn-primary" style="margin: 0 0 1% 1.5%;">Save</button>
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
    $('.select-type').on('change', function() {
        $active = $('.select-type').val();
        if ($active == 'category') {
            $('.new').prop("disabled", true);
            $('.cate').prop("disabled", false);
        } else {
            $('.cate').prop("disabled", true);
            $('.new').prop("disabled", false);
        }
    });
    if ($('.select-type').val() == 'category') {
        $('.new').prop("disabled", true);
        $('.cate').prop("disabled", false);
    } else {
        $('.cate').prop("disabled", true);
        $('.new').prop("disabled", false);
    }

    $('#edit-menu').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($('#edit-menu')[0]);
        $.ajax({
            url: "{{url('admin/menus/edit')}}" + "/{{$menus->id}}",
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                location.href = "{{url('admin/menus/list')}}";
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