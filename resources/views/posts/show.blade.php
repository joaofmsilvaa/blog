@extends ('Components.layout')

@props(['post', 'categories'])

@section('content')
    <section class="px-6 py-2">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    @if(isset($post->thumbnail))
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post thumbnail"
                             class="rounded-xl">
                    @else
                        <img src="{{ asset('images/illustration1.png' . $post->thumbnail) }}" alt="Blog Post thumbnail"
                             class="rounded-xl">
                    @endif


                    <p class="mt-4 block text-gray-400 text-xs">
                        Published
                        <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>


                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        @if(isset($post->author->profilePicture))
                            <img src="/storage/{{$post->author->profilePicture}}" alt="Profile picture"
                                 class="w-14 rounded-full">

                        @else
                            <img src="/storage/profilePictures/defaultImage.jpg" alt="Profile picture"
                                 class="w-14 rounded-full">
                        @endif
                        <div class="ml-3 text-left">
                            <h5 class="font-bold"><a
                                        href="/?author={{$post->author->username}}"> {{$post->author->name}}</a></h5>
                            <h6><a href="/?author={{$post->author->username}}">{{$post->author->username}}</a></h6>

                        </div>
                    </div>
                    <div class="flex-col items-center lg:justify-center text-sm mt-4">
                        <div class="flex justify-center items-center ml-2">
                            <p class="mr-1 text-base text-blue-400">{{$post->view_count}}</p>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" style="fill: rgb(96 165 250);"
                                 viewBox="0 0 20 14">
                                <path
                                        d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                            </svg>
                        </div>

                        @if($canDelete || $isPosted)
                            <div>
                                @if ($canDelete)
                                    <div class="flex-col">
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 transition hover:bg-red-400 rounded text-white p-1 mt-3 px-2">
                                                Delete
                                                Post
                                            </button>
                                        </form>
                                        <div class="mt-2">
                                            <a href="/posts/{{$post->id}}/edit"
                                               class="bg-blue-600 transition hover:bg-blue-400 rounded text-white p-1 mt-3 px-8">Edit</a>
                                        </div>
                                    </div>
                                @endif

                                @if($isPosted)
                                    <form method="POST" action="{{ route('posts.publish', $post->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="bg-green-600 transition hover:bg-green-400 rounded text-white p-1 mt-3 px-5">
                                            Publish
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category :post="$post"/>
                        </div>
                    </div>

                    <div class="flex-col justify-center items-center">
                        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                            {{$post->title}}
                        </h1>
                        @if(!$isBookmarked)
                            <div class="p-2 flex justify-center">
                                <form method="POST" action="{{ route('bookmarks.store', $post->id) }}">
                                    @csrf

                                    <button type="submit"
                                            class="bg-gray-800 px-8 rounded-full text-white py-2 text-base flex transition-colors duration-300 hover:bg-yellow-300">
                                        <span class="mr-2">Bookmark</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             style="fill: rgb(255,255,255);">
                                            <path d="M13 14v-3h3V9h-3V6h-2v3H8v2h3v3z"></path>
                                            <path
                                                    d="M20 22V4c0-1.103-.897-2-2-2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22zM6 10V4h12v14.553l-6-3.428-6 3.428V10z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        @else
                            <div class="p-2 flex justify-center">
                                <form method="POST" action="{{ route('bookmarks.delete', $post->id) }}">
                                    @csrf

                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 px-8 rounded-full text-white py-2 text-base flex transition-colors duration-300 hover:bg-red-400">
                                        <span class="mr-2">Remove bookmark</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" style="fill: rgb(255,255,255);">
                                            <path d="M8 9h8v2H8z"></path>
                                            <path d="M20 22V4c0-1.103-.897-2-2-2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22zM6 10V4h12v14.553l-6-3.428-6 3.428V10z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div class="space-y-4 lg:text-lg leading-loose text-justify">
                        <p>{!! $post->body !!}</p>
                    </div>

                </div>
            </article>

            @if(!$isPosted)
                <section class="col-span-8 col-start-5 mt-10 space-y-5">
                    @include('posts._addCommentForm')

                    @if($post->comment()->count() > 0)
                        @foreach($post->comment as $comment)
                            <x-comment :comment="$comment"/>
                        @endforeach

                    @else
                        <x-pannel>
                            This post has no comments yet.
                        </x-pannel>

                    @endif
                </section>
            @endif
        </main>

    </section>
@endsection
