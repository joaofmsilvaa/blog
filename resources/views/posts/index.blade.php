@extends ('components.layout')

@section('content')

<<<<<<< Updated upstream
    <x-postLayout :post="$posts[0]"/>

    @if($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-3">
=======
    <div class="p-8">

        @if($posts->count() > 1)
            <x-postLayout :post="$posts[0]"/>

            <div class="lg:grid lg:grid-cols-3">
>>>>>>> Stashed changes

            @foreach($posts->skip(1) as $post)
                    <x-postLayout :post="$post"/>
            @endforeach

        </div>
    @else
        <p class="mt-4">No posts yet</p>
    @endif

@endsection
