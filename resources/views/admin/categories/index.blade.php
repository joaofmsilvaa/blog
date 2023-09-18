@extends ('components.layout')

@section('content')
    <x-settings heading="Manage Posts">

        <div class="overflow-x-auto">
            @if($categories->count() > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 flex-1">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Posts
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
                    @foreach($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category->name}}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category->slug}}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category->posts_count}}
                            </th>


                            <td class="px-6 py-4">
                                <a href="/admin/categories/{{$category->id}}/edit"
                                   class="text-blue-500 hover:text-blue-600">Edit</a>
                            </td>

                            <td class="px-6 py-4">
                                <form action="/admin/categories/{{$category->id}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-500 hover:text-red-600"
                                            onclick="return confirm('By clicking \'ok\' you confirm that you are aware that the category will be permanently deleted?')">
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @else
                <p class="text-center text-lg text-gray-500">No categories yet. Come back later</p>
            @endif
        </div>

        <div class="p-3">
            {{$categories->links()}}
        </div>

    </x-settings>
@endsection
