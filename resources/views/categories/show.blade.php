<p>id : {{$category->id   }}</p>
<p>name :{{$category->name}}</p>
<p> parent{{$category->parent }}</p>
<p>description{{$category->description }}</p>
<td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a></td>
<td>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>