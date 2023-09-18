@extends ('components.layout')

@section('content')
    <x-settings heading="Edit Post: {{ $post->title}}">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <x-form.formInput name="title" value="{{$post->title}}"/>

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
            <x-form.formInput name="slug" value="{{$post->slug}}"/>

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>
            <div class="flex-col mt-6">
                <div class="my-3">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                         id="image_preview"
                         alt="Blog Post thumbnail"
                         class="rounded-xl w-1/2 h-96 object-cover border-2 border-black-500"
                         :value="old('thumbnail', $post->thumbnail)">
                </div>
                <div>
                    <x-form.formInput name="thumbnail" type="file"/>
                </div>
            </div>

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
            <x-form.textarea name="excerpt">{{$post->excerpt}}</x-form.textarea>

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
            <x-form.textarea name="body">{{$post->body}}</x-form.textarea>

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <div class="mb-6">

                <select name="category_id" id="category_id">
                    @php
                        $categories = App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                            {{ucwords($category->name)}}</option>
                    @endforeach

                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>


            <div class="flex justify-end mt-2 border-t border-gray-300">
                <button type="submit"
                        class="bg-blue-500 mt-2 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </x-settings>


    <script>
        const imageInput = document.getElementById('thumbnail');
        const imagePreview = document.getElementById('image_preview');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    </script>
@endsection
