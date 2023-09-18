@extends ('components.layout')

@section('content')
    <x-settings heading="Manage Posts">

        <div class="overflow-x-auto">
            @if($posts->count() > 0)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 flex-1">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Posted at
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
                    @foreach($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                            </th>
                            <td class="px-6 py-4 flex items-center">
                                @if(isset($post->author->profilePicture))
                                    <img src="/storage/{{$post->author->profilePicture}}"
                                         alt="Profile picture"
                                         class="w-10 rounded-full mr-2">

                                @else
                                    <img src="/storage/profilePictures/defaultImage.jpg"
                                         alt="Profile picture"
                                         class="w-10 rounded-full mr-2">
                                @endif
                                <a href="/profile/{{$post->author->id}}">{{$post->author->name}}</a>
                            </td>
                            <td class="px-6 py-4">
                                @if(isset($post->status) && $post->status)
                                    <p class="text-sm text-green-500">Posted</p>
                                @else
                                    <p class="text-sm text-red-500">Not Posted</p>
                                @endif

                            </td>

                            <td class="px-6 py-4">
                                @if(isset($post->status) && $post->status)
                                    <p class="text-sm">{{$post->published_at}}</p>
                                @else
                                    <p class="text-sm text-gray-400">Null</p>
                                @endif

                            </td>

                            <td class="px-6 py-4">
                                <a href="/admin/posts/{{$post->id}}/edit"
                                   class="text-blue-500 hover:text-blue-600">Edit</a>
                            </td>

                            <td class="px-6 py-4">
                                <form action="/admin/posts/{{$post->id}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-500 hover:text-red-600"
                                            onclick="return confirm('By clicking \'ok\' you confirm that you are aware that the post will be permanently deleted?')">
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
            {{$posts->links()}}
        </div>

    </x-settings>
@endsection
