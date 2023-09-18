@extends ('components.layout')

@section('content')
    <x-settings heading="Edit Category: {{ $category->name}}">
        <form method="POST" action="/admin/categories/{{$category->id}}">
            @csrf
            @method('PATCH')

            <x-form.formInput name="name" value="{{$category->name}}"/>

            <x-form.formInput name="slug" value="{{$category->slug}}"/>

            <div class="flex justify-end mt-2 border-t border-gray-300">
                <button type="submit"
                        class="bg-blue-500 mt-2 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </x-settings>

@endsection
