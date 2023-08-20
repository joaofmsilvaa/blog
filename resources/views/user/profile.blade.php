@extends ('Components.layout')

@section('content')

    <div class="flex justify-center">
        <div class="p-8 w-3/4 justify-center">
            <div class="p-8 md:items-center justify-center lg:justify-start lg:items-start bg-gray-100 rounded-xl">
                <div class="flex flex-col">
                    <div class="flex ">
                        <div class="flex items-center">
                            <div
                                class="sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-32 lg:h-32 w-24 h-24 rounded-full overflow-hidden object-cover">
                                <img src="/images/profilePicture.jpg"
                                     alt="profile picture"
                                     class="object-cover border-b-2 shadow-2xl"
                                >
                            </div>
                            <div class="ml-6">
                                <div>
                                    <p class="font-semibold text-lg">Posts</p>
                                    <p>{{$amountOfPosts}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="ml-3 mt-5">
                        <div class="flex flex-col items-start">
                            <h1 class="text-xl font-semibold">{{$user->name}}
                                @can('editProfile', $user)
                                    <a href="#" class="bg-blue-600 rounded p-1 text-white text-sm ml-3"> Edit
                                        profile </a>
                                @endcan
                            </h1>
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

            <div class="mt-3 rounded-xl border-b-2 p-3 bg-blue-50">
                <x-post-list :posts="$posts"/>

            </div>

        </div>
    </div>

@endsection
