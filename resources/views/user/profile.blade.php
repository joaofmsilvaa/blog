@extends ('Components.layout')

@section('content')

    <div class="p-8">
        <div class="p-8 flex bg-gray-100 rounded">
            <div class="sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-32 md:w-32 w-24 h-24 rounded-full overflow-hidden">
                <img src="/images/profilePicture.jpg"
                     alt="profile picture"
                     class="object-cover border-b-2 shadow-2xl"
                >
            </div>
            <div class="ml-6">
                <div class="flex flex-col items-start">
                    <h1 class="text-xl font-semibold">{{$user->name}}</h1>
                    <p class="text-md text-gray-500 mt-1">
                        <spam>{{$user->username}}</spam>
                    </p>
                    @if($user->description !== null)
                        <p class="mt-3">{{$user->description}}</p>

                    @else
                        <p class="mt-3">This user haven't set their description yet :/</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <x-post-list :posts="$posts"/>

@endsection
