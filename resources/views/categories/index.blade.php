<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>news count</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->description }}</td>
                @foreach ($categories as $category)
                    {{ $category->news_count }}
                @endforeach

                <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>