@if(isset($experiences))
    <a href="{{ route('experiences.edit', $experiences->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <a href="{{ route('experiences.edit', $experiences->id) }}" class="btn btn-sm btn-danger">Delete</a>
@endif
