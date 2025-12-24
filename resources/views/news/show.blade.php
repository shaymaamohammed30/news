<p>title:{{ $new->title }}</p>
<p>type:{{ $new->type }}</p>
<p>content:{{ $new->content }}</p>
<p>image:{{ $new->image }}</p>
<p>video_url:{{ $new->video_url }}</p>
<p>is_breaking:{{ $new->is_breaking }}</p>

<p>category_id:{{ $new->category_id }}</p>

<a href="{{ route('news.edit', $new->id) }}" class="btn btn-primary">Edit</a>
<form action="{{ route('news.destroy', $new->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
