@can('edit_datas')
    <a href="{{ route('datas.edit', $id)}}" class="btn btn-primary">Edit</a>
@endcan
@can('delete_datas')
    <form class="d-inline" action="{{ route('datas.destroy', $id)}}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this user?')" type="submit">Delete</button>
    </form>
@endcan
