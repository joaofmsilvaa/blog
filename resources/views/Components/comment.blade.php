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

        <div>
            <header class="text-justify">
                <h3 class="font-bold">{{$comment->user->username}}</h3>
                <p class="text-xs">Posted
                    <time>{{$comment->created_at->format('F j, Y')}}</time>
                </p>
            </header>

            <p class="mt-3 text-justify">{{$comment->body}}</p>
        </div>
    </article>
</x-pannel>
