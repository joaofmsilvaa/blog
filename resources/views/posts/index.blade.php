@extends ('components.layout')

@section('content')

    <div class="p-5">
        <x-header/>
    </div>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($post->count())
            <x-post-grid :posts="$post"/>

            {{$post->links()}}

        @else
            <p class="text-center">No posts yet.</p>

        @endif
    </main>
@endsection
