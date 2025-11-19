<x-flash-message></x->



<div class="container mt-4">

    <h2 class="mb-4">إنشاء فئة جديدة</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- بداية الفورم --}}
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        {{-- حقل اسم الفئة --}}
        <x-form.input 
            name="name" 
            label="اسم الفئة"
            placeholder="ادخل اسم الفئة.."
            :value="$category->name ?? ''"
        />

        {{-- حقل وصف الفئة --}}
        <x-form.input 
            name="description" 
            label="الوصف"
            type="textarea"
            placeholder="اكتب وصفاً قصيراً عن الفئة"
            :value="$category->description ?? ''"
        />

        {{-- زر الإرسال --}}
        <button type="submit" class="btn btn-primary mt-3">
            إنشاء الفئة
        </button>
    </form>

</div>


