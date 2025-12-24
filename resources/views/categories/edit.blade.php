<h1>Edit the category</h1>
<x-flash-message></x->

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-form.input name="name" label="اسم الفئة" placeholder="ادخل اسم الفئة.." :value="$category->name ?? ''" />
    <x-form.input name="description" label="الوصف" type="textarea" placeholder="اكتب وصفاً قصيراً عن الفئة" :value="$category->description ?? ''" />

    <x-form.select name="parent_id" label="Parent Category" :options="$parents->pluck('name','id')" :selected="$category->parent_id" />

    <button type="submit" class="btn btn-primary">Update</button>
</form>
