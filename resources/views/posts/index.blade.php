@extends ('components.layout')

@section('content')

    <x-mainHeader/>

    <div class="mt-3">
        <x-pannel>
            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

                @if ($post->count())
                    <x-post-grid :posts="$post"/>

                @else
                    <p class="text-center text-lg text-gray-500">No posts yet. Come back later</p>

                @endif
            </main>
        </x-pannel>
    </div>
@endsection
