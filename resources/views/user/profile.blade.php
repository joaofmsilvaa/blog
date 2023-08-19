@extends ('Components.layout')

@section('content')

        <div class="p-8 flex">
            <div class="w-32 h-32 rounded-full overflow-hidden">
                <img src="/images/profilePicture.jpg"
                     alt="profile picture"
                     class="object-cover border-b-2 shadow-2xl"
                >
            </div>
            <div class="ml-6 left-0 items-center">
                <h1 class="text-xl font-semibold">{{auth()->user()->name}}</h1>
                <p class="text-xl">{{auth()->user()->username}}</p>
            </div>
        </div>

        <x-post-list :posts="$posts"/>

@endsection
