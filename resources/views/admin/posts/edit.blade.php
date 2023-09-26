@extends ('components.layout')

@section('content')
    <x-settings heading="Edit Post: {{ $post->title}}">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')

            <div class="flex justify-center">
                <div class="mr-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                    <select name="user_id" id="user_id">
                        @php
                            $users = App\Models\User::all();
                        @endphp

                        @foreach($users as $user)
                            <option value="{{$user->id}}"
                                {{old('user_id', $post->author->id) == $user->id ? 'selected' : ''}}>
                                {{$user->username}}</option>
                        @endforeach

                        @error('user')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </select>
                </div>

                <div class="mr-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
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
            </div>

            <div class="mt-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <x-form.formInput name="title" value="{{$post->title}}"/>
            </div>

            <div class="mt-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <x-form.formInput name="slug" value="{{$post->slug}}"/>
            </div>

            <div class="mt-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>
                <div class="flex-col mt-6">
                    <div class="my-3">
                        @if(isset($post->thumbnail))
                            <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                 id="image_preview"
                                 alt="Blog Post thumbnail"
                                 class="rounded-xl w-1/2 h-96 object-cover border-2 border-black-500"
                            >
                        @else
                            <img src="{{ asset('images/illustration1.png') }}"
                                 id="image_preview"
                                 alt="Blog Post thumbnail"
                                 class="rounded-xl w-1/2 h-96 object-cover border-2 border-black-500"
                                 :value="old('thumbnail', $post->thumbnail)">
                        @endif
                    </div>
                    <div>
                        <x-form.formInput name="thumbnail" type="file"/>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                <x-form.textarea name="excerpt">{{$post->excerpt}}</x-form.textarea>
            </div>

            <div class="mt-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <x-form.textarea name="body">{{$post->body}}</x-form.textarea>
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
