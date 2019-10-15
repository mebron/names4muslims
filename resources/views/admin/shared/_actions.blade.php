<div class="btn-group" role="group" aria-label="Actions">
@can('edit_'.$entity)
<a href="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class="btn btn-sm btn-light">
  ✏️ Edit</a>
@endcan

@can('delete_'.$entity)
<form action="{{ route($entity.'.destroy', ['user' => $id]) }}" method="POST" class="form form-inline">
@method('delete')
@csrf
<button type="submit" class="btn-delete btn btn-sm btn-light">
  ❌
</button>
</form>
@endcan
</div>
