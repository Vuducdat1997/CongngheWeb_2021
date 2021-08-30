@foreach($new as $news)
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
    <td>{{$news->view_count}}</td>
    <td>
        <a class="btn btn-info btn-sm" href="{{url('admin/news/edit')}}/{{$news->id}}">
            <i class="fas fa-pencil-alt" style="padding-right: 5px;">
            </i>
            Edit
        </a>
        <form style="display:inline;" action="{{url('admin/news/delete')}}/{{$news->id}}" method="post">
            @method('delete')
            @csrf
            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"
                style="margin-top:0px"><i class="fas fa-trash"></i>Delete</button>
        </form>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="12" align="center">
        {!! $new->links('vendor.pagination.bootstrap-4') !!}
    </td>
</tr>