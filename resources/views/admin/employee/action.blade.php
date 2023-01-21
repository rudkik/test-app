<a href="{{ route('employees.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    Edit
</a>
<form action="/admin/delete-employees" method="POST">
    @csrf
    <input type="text" value="{{$id}}" name="id" hidden>
    <button type="submit"  class="delete btn btn-danger" >
        Delete
    </button>
</form>

