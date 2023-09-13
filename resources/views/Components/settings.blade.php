<section class="py-8 py-8 max-w-full mx-auto">

    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>

    <div class="flex items-center">
        <aside class="w-full flex mb-6">
            <h4 class="font-semibold">Links:</h4>
            <ul class="flex">
                <li class="px-3">
                    <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}">All Posts</a>
                </li>
                <li class="px-3">
                    <a href="/admin/categories" class="{{request()->is('admin/categories') ? 'text-blue-500' : ''}}">All Categories</a>
                </li>
                <li class="px-3">
                    <a href="/admin/posts" class="{{request()->is('admin/users') ? 'text-blue-500' : ''}}">All Users</a>
                </li>
            </ul>
        </aside>
    </div>

    <main  class="flex-1">
        <x-pannel>
            {{$slot}}
        </x-pannel>
    </main>

</section>
