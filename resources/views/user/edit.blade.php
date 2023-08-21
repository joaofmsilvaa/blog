@extends ('Components.layout')

@section('content')

    <div class="flex justify-center">
        <div class="p-8 w-3/4 justify-center">
            <h1>Edit profile</h1>
            <form method="POST" action="/profile/{{$user->id}}/update" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.formInput name="title" value="{{$user->name}}"/>

                <x-form.formInput name="slug" value="{{$user->username}}"/>

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.formInput name="thumbnail" type="file" :value="old('thumbnail', $user->profilePicture)"/>
                    </div>

                    <img src="/storage/{{$post->thumbnail}}" alt="Thumbnail" class="rounded-xl ml-6" width="100">
                </div>

                <x-form.textarea name="excerpt">{{$post->excerpt}}</x-form.textarea>

                <x-form.textarea name="body">{{$post->body}}</x-form.textarea>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="category_id">Category</label>

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
        </div>
    </div>

@endsection
