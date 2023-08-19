@extends ('Components.layout')

@section('content')

        <div class="p-8 flex">
            <div class="sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-32 md:w-32 w-24 h-24 rounded-full overflow-hidden">
                <img src="/images/profilePicture.jpg"
                     alt="profile picture"
                     class="object-cover border-b-2 shadow-2xl"
                >
            </div>
            <div class="ml-6 flex">
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold">{{$user->name}}</h1>
                    <p class="text-xl">{{$user->username}}</p>
                </div>
            </div>

        </div>

        <x-post-list :posts="$posts"/>

@endsection
