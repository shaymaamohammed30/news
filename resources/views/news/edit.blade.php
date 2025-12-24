<h1>Edit the new</h1>
<x-flash-message></x->

<form action="{{ route('news.update', $new->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-form.input name="title" label="title of the new" placeholder="  .." :value="$new->title ?? ''" />
    <x-form.input name="type" label="type of the new" placeholder="  .." :value="$new->type ?? ''" />
    <x-form.input type="file" name="image" label="image of the new" placeholder="  .." :value="$new->image ?? ''" />
   <x-form.select class="select" name="category_id" label="Category" :options="$categories_id->pluck('name', 'id')"
        :selected="old('category_id') " />

    <x-form.input name="content" label="content" type="textarea" placeholder=".." :value="$new->content ?? ''" />
    <button type="submit" class="btn btn-primary">Update</button>
</form>
