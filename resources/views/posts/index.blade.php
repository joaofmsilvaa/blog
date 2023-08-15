@extends ('components.layout')

@section('content')

    <x-postLayout :post="$posts[0]"/>

    @if($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-3">

            @foreach($posts->skip(1) as $post)
                    <x-postLayout :post="$post"/>
            @endforeach

        </div>
    @else
        <p class="mt-4">No posts yet</p>
    @endif

@endsection
