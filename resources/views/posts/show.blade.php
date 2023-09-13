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

                            @if($canDelete || $isPosted)
                                <div>
                                    @if ($canDelete)
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 transition hover:bg-red-400 rounded text-white p-1 mt-3">
                                                Delete
                                                Post
                                            </button>
                                        </form>
                                    @endif

                                    @if($isPosted)
                                        <form method="POST" action="{{ route('posts.publish', $post->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                    class="bg-green-600 transition hover:bg-green-400 rounded text-white p-1 mt-3">
                                                Publish
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endif
                        </div>
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

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose text-justify">
                        <p>{!! $post->body !!}</p>
                    </div>

                </div>
            </article>

            <section class="col-span-8 col-start-5 mt-10 space-y-5">
                @include('posts._addCommentForm')

                @foreach($post->comment as $comment)
                    <x-comment :comment="$comment"/>
                @endforeach
            </section>

        </main>

    </section>
@endsection
