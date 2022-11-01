<a href="{{ route('users.show', $id) }}" data-toggle="tooltip" data-original-title="Show">
    <i class="fa-solid fa-eye"></i>
</a>
<a href="{{ route('users.edit', $id) }}" data-toggle="tooltip" data-original-title="Edit">
    <i class="fa-solid fa-user-pen"></i>
</a>
<form class="inline-block" action="{{ route('users.destroy', $id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" title="delete" style="border: none; background-color:transparent;">
        <i class="fas fa-trash text-red-600"></i>
    </button>
</form>

