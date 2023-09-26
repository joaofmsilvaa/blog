@extends('Components.layout')

@props(['post'])

@section('content')
<div class="flex-1 p-8 m-8">
    <div class="mt-8 flex justify-center">
        <h1 class="text-3xl font-semibold">Editing post:<span class="ml-2">{{$post->title}}</span></h1>
    </div>
    <div class="mt-8">
        <x-pannel>
            <form method="POST" action="/posts/{{$post->id}}/patch" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <x-form.formInput name="title" value="{{$post->title}}"/>

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <x-form.formInput name="slug" value="{{$post->slug}}"/>

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>
                <div class="flex-col mt-6">
                    <div class="my-3">
                        @if(isset($post->thumbnail))
                            <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                 id="image_preview"
                                 alt="Blog Post thumbnail"
                                 class="rounded-xl w-1/2 h-96 object-cover border-2 border-black-500"
                                 :value="old('thumbnail', $post->thumbnail)">
                        @else
                            <img src="/images/illustration1.png"
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

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                <x-form.textarea name="excerpt" id="excerpt">{{$post->excerpt}}</x-form.textarea>

                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea name="body" id="body">{{$post->body}}</textarea>


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
        </x-pannel>
    </div>

</div>
@endsection
