@auth
    <x-pannel>
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf

            <header class="flex items-center">
                @if(isset(auth()->user()->profilePicture))
                    <img src="/storage/{{auth()->user()->profilePicture}}" alt="Profile picture"
                         class="w-14 rounded-full">

                @else
                    <img src="/storage/profilePictures/defaultImage.jpg" alt="Profile picture"
                         class="w-14 rounded-full">
                @endif
                <h2 class="ml-3">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body"
                          class="w-full text-sm focus:outline-none focus:ring"
                          rows="5"
                          placeholder="Quick, think of something to say!"
                          required></textarea>

                @error('body')
                <span class="text-xs text-red-500 text-semibold">{{$message}}</span>
                @enderror


            </div>

            <div class="flex justify-end mt-2 border-t border-gray-300">
                <button type="submit"
                        class="bg-blue-500 mt-2 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Post
                </button>
            </div>

        </form>
    </x-pannel>
@else
    <p class="font-semibold">
        <a href="/register"
           class="hover:underline">
            Register </a> or
        <a href="/login"
           class="hover:underline"> Log-in </a>
        to leave a comment</p>

@endauth
