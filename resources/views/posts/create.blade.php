@extends ('Components.layout')

@section('content')
    <div class="mt-5 p-8">
        <div class="mt-5 p-8 bg-gray-100 rounded-xl">
            <form method="POST" action="/posts/publish" enctype="multipart/form-data">
                @csrf

                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <x-form.formInput name="title"/>

                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <x-form.formInput name="slug"/>


                <div class="flex flex-col items-center mt-6">
                    <div class="flex flex-col mt-6 items-center">
                        <div class="flex-1">
                            <x-form.formInput name="thumbnail" type="file"/>
                        </div>
                    </div>

                    <div class="flex-1 lg:mr-8" id="div_preview1">
                        <img src="#"
                             id="image_preview1"
                             class="rounded-xl"
                             style="display: none">

                        <figcaption
                            class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                            Featured post preview
                        </figcaption>
                    </div>

                </div>

                <label for="excerpt"
                       class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                <x-form.textarea name="excerpt"/>

                <label for="Body"
                       class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea name="body" id="body"></textarea>

                <div class="mb-6 mt-2">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="category_id">Category</label>
                    <select name="category_id" id="category_id">
                        @php
                            $categories = App\Models\Category::all();
                        @endphp

                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                {{old('category_id') == $category->id ? 'selected' : ''}}>
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
                        Publish
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        const profileImageInput = document.getElementById('thumbnail');
        const imagePreview = document.getElementById('image_preview1');


        profileImageInput.addEventListener('change', function (event) {
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
