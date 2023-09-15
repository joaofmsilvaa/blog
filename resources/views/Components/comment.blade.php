@props(['comment'])
<x-pannel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            @if(isset($comment->user->profilePicture))
                <img src="/storage/{{$comment->user->profilePicture}}" alt="Profile picture"
                     class="w-14 rounded-full">

            @else
                <img src="/storage/profilePictures/defaultImage.jpg" alt="Profile picture"
                     class="w-14 rounded-full">
            @endif
        </div>

        <div class="w-full">
            <header class="text-justify">
                <div class="flex">
                    <div class=" w-1/2">
                        <h3 class="font-bold">{{$comment->user->username}}</h3>
                    </div>
                    @if(auth()->user()?->id == $comment->user->id || auth()->user()?->username == 'joao')

                        <div class="w-1/2 text-right">
                            <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <div class="flex" style="color: rgba(239,7,7,1);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239,7,7,1);">
                                            <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z"></path>
                                        </svg>
                                        <p>Delete</p>
                                    </div>
                                </button>
                            </form>

                        </div>
                    @endif
                </div>

                <p class="text-xs">Posted
                    <time>{{$comment->created_at->diffForHumans()}}</time>
                </p>
            </header>

            <p class="mt-3 text-justify">{{$comment->body}}</p>
        </div>
    </article>
</x-pannel>
