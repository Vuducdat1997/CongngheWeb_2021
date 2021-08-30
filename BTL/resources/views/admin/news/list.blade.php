@extends('admin.layout.index')
@section('content')
<style>
.content .card .card-header button a {
    color: #ffffff;

}

.content .card .card-header button {
    float: right;
}

.search-category {
    position: relative;
    top: 35px;
    text-align: right;
    margin: 10px 20px 0px 0px;
}

.custom-select {
    width: 15%;
}

.datatable {
    width: 65%;
}

.pagination {
    float: right;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Table News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List News</li>
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
                            <h3 class="card-title">List News</h3>
                            <button class="btn btn-success"><a href="{{url('admin/news/add')}}">+ Add
                                    News</a></button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="search-category">
                                <label>Search Categories:</label>
                                <select id="search" name="categories" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($categories as $categories)
                                    <option value="{{$categories->name}}">{{$categories->name}}
                                    </option>
                                    @foreach($categories->parent as $cate_child)
                                    <option value="{{$cate_child->name}}">&emsp;__{{$cate_child->name}}
                                    </option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Categories</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th>User</th>
                                        <th>Edit, Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $news)
                                    <tr>
                                        <td>{{$news->categoriname}}</td>
                                        <td>{!! $news->title !!}</td>
                                        <td>{!! $news->slug !!}</td>
                                        <td>
                                            <img width="100px" src="{{url('upload/news')}}/{{$news->image}}" alt="">
                                        </td>
                                        <td>
                                            @if($news->status == 0)
                                            Show
                                            @else
                                            Hide
                                            @endif
                                        </td>
                                        <td>
                                            @if($news->featured == 0)
                                            Yes
                                            @else
                                            No
                                            @endif
                                        </td>
                                        <td>{{$news->username}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{url('admin/news/edit')}}/{{$news->id}}">
                                                <i class="fas fa-pencil-alt" style="padding-right: 5px;">
                                                </i>
                                                Edit
                                            </a>
                                            <form style="display:inline;"
                                                action="{{url('admin/news/delete')}}/{{$news->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger btn-sm" style="margin-top:10px"><i
                                                        class="fas fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
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
@section('script')
<script type="text/javascript">
function fetch_data(page, query) {
    $.ajax({
        type: 'get',
        data: {
            'search': query
        },
        url: "{{ URL::to('admin/news/search?page=') }}" + page,
        success: function(data) {
            $('tbody').html(data);
        }
    })
}


$('#search').on('change', function() {
    var value = $(this).val();
    var page = $('#hidden_page').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    fetch_data(page, value);

    if ($('.search-news')) {
        $('.paginate').hide();
    }
});
$(document).on('click', '.paginate .pagination a', function(event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    $('#hidden_page').val(page);

    $('li').removeClass('active');
    $(this).parent().addClass('active');

    var value = $('#search').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    fetch_data(page, value);
});

$(document).on('keyup', '#example1_filter', function() {
    if ($('.search-news')) {
        $('.paginate').show();
    }
});
</script>
@endsection