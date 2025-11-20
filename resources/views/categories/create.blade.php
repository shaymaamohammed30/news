<x-flash-message></x->
    <div class="container mt-4">
        <h2 class="mb-4">إنشاء فئة جديدة</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <x-form.input name="name" label="اسم الفئة" placeholder="ادخل اسم الفئة.." :value="$category->name ?? ''" />
            <x-form.input name="description" label="الوصف" type="textarea" placeholder="اكتب وصفاً قصيراً عن الفئة"
                :value="$category->description ?? ''" />
                <x-form.select class="select" name="parents_id" label="perant" :options="$parents->pluck('name','id')"
                    :selected="$category->parent_id"></x-form>
            <button type="submit" class="btn btn-primary mt-3">add category
            </button>
        </form>

    </div>