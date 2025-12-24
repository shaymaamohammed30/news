<h1 class="mb-4">Add News</h1>
<x-flash-message />

<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Title --}}
    <x-form.input name="title" label="News Title" placeholder="أدخل عنوان الخبر" :value="old('title')" />

    {{-- Type --}}
    <x-form.input name="type" label="News Type" placeholder="اكتب نوع الخبر" :value="old('type')" />

    {{-- Content --}}
    <x-form.input name="content" type="textarea" label="Content" placeholder="اكتب محتوى الخبر كاملاً"
        :value="old('content')" />

    {{-- Category --}}
    <x-form.select class="select" name="category_id" label="Category" :options="$categories->pluck('name', 'id')"
        :selected="old('category_id')" />

    {{-- Image --}}
    <div class="mt-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    {{-- Video --}}
    <div class="mt-3">
        <label class="form-label">Video URL</label>
        <input type="text" name="video_url" class="form-control" placeholder="رابط الفيديو (اختياري)">
    </div>

    {{-- Breaking News --}}
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="1" name="is_breaking">
        <label class="form-check-label">Breaking News (عاجل)</label>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Add News</button>

</form>