<header>
    <h1>News List</h1>
    <a href="{{ route('news.create') }}" class="btn btn-success">Create News</a>
</header>


<form action="{{ route('news.index') }}" method="GET">

    <x-form.input type="text" name="title" placeholder="ابحث بالعنوان" value="{{ request('title') }}"/>
 

    <button type="submit">بحث</button>
</form>
<form action="{{ route('news.index') }}" method="GET">


    <x-form.select class="select" name="category_id" label="Category" :options="$categories->pluck('name', 'id')"
        :selected="old('category_id')" />


    <button type="submit">بحث</button>
</form>



<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>type</th>
            <th>content</th>
            <th>image</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $newsItem)
            <tr>
                <td>{{ $newsItem->id }}</td>
                <td><a href="{{ route('news.show', $newsItem->id) }}">{{ $newsItem->title }}</a></td>
                <td>{{ $newsItem->type }}</td>
                <td>{{ $newsItem->content }}</td>
                {{-- <td>{{ $newsItem->image }}</td> --}}
                <td><a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $news->links()}}