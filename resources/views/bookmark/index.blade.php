@extends ('components.layout')

@section('content')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <x-pannel>
            <h1 class="text-3xl">Bookmarks</h1>
        </x-pannel>
        <x-pannel>
            @if ($posts->count() > 0)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach ($posts as $post)
                        <x-postLayout :post="$post" class="col-span-3"/>
                    @endforeach
                </div>

            @else
                <p class="text-center text-lg text-gray-500">You haven't saved any posts yet. Go and find some ;-)</p>

            @endif
        </x-pannel>
    </main>
@endsection
