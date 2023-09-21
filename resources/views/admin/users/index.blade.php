@extends ('components.layout')

@section('content')
    <x-settings heading="Manage Users">

        <div class="relative overflow-x-auto">
            @if($users->count() > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 flex-1">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            E-mail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Profile Picture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                        <th scope="col" class="px-3 py-3">
                            Delete
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/profile/{{$user->id}}">{{$user->name}}</a>
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/profile/{{$user->id}}">{{$user->username}}</a>
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/profile/{{$user->id}}">{{$user->email}}</a>
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/profile/{{$user->id}}">
                                    <div
                                        class="sm:w-16 sm:h-16 md:w-22 md:h-22 lg:w-22 lg:h-22 w-18 h-18 rounded-full overflow-hidden object-cover">
                                        @if(isset($user->profilePicture))
                                            <img src="/storage/{{$user->profilePicture}}" alt="profile picture"
                                                 class="object-cover border-b-2 shadow-2xl">

                                        @else
                                            <img src="/storage/profilePictures/defaultImage.jpg" alt="profile picture"
                                                 class="object-cover border-b-2 shadow-2xl">
                                        @endif

                                    </div>
                                </a>
                            </th>

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p>{{$user->created_at}}</p>
                            </th>

                            <td class="px-6 py-4">
                                <a href="/admin/users/{{$user->id}}/edit"
                                   class="text-blue-500 hover:text-blue-600">Edit</a>
                            </td>

                            <td class="px-6 py-4">
                                <form action="/admin/users/{{$user->id}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-500 hover:text-red-600"
                                            onclick="return confirm('By clicking \'ok\' you confirm that you are aware that the user will be permanently deleted?')">
                                        Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @else
                <p class="text-center text-lg text-gray-500">No posts yet. Come back later</p>
            @endif
        </div>

        <div class="p-3">
            {{$users->links()}}
        </div>

    </x-settings>
@endsection
