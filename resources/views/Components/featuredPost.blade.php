@props(['post'])

<article

    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="relative">
        <div class="absolute right-0 p-2 flex">
            <form method="POST" action="{{ route('bookmarks.store', $post->id) }}">
                @csrf

                <button type="submit"
                        class="bg-gray-800 px-2 rounded-full text-white py-2 text-base flex transition-colors duration-300 hover:bg-yellow-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         style="fill: rgb(255,255,255);">
                        <path d="M13 14v-3h3V9h-3V6h-2v3H8v2h3v3z"></path>
                        <path
                            d="M20 22V4c0-1.103-.897-2-2-2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22zM6 10V4h12v14.553l-6-3.428-6 3.428V10z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            @if(isset($post->thumbnail))
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post thumbnail"
                     class="rounded-xl w-full h-96 object-cover">
            @else
                <img src="images/illustration1.png" alt="Blog Post thumbnail"
                     class="rounded-xl w-full h-96 object-cover">
            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4 text-justify">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    @if(isset($post->author->profilePicture))
                        <img src="/storage/{{$post->author->profilePicture}}" alt="Profile picture"
                             class="w-14 rounded-full">

                    @else
                        <img src="/storage/profilePictures/defaultImage.jpg" alt="Profile picture"
                             class="w-14 rounded-full">
                    @endif

                    <div class="ml-3 flex items-center">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </h5>

                        <div class="flex justify-center items-center ml-2">
                            <p class="mr-1 text-base text-blue-400">{{$post->view_count}}</p>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" style="fill: rgb(96 165 250);" viewBox="0 0 20 14">
                                <path
                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
