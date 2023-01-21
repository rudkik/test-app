<a href="{{ route('companies.show',$id) }}" data-toggle="tooltip" data-original-title="Show" class="show btn btn-info edit">
    Show
</a><a href="{{ route('companies.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    Edit
</a>
<form action="/admin/delete-companies" method="POST">
    @csrf
    <input type="text" value="{{$id}}" name="id" hidden>
    <button type="submit"  class="delete btn btn-danger" >
        Delete
    </button>
</form>

