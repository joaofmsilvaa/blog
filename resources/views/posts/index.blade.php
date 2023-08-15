@extends ('components.welcome')

@section('content')

    @if($posts->count())
        <div class="lg:grid lg:grid-cols-3">

            @foreach($posts as $post)
                <x-postLayout :post="$post"/>
            @endforeach

        </div>
    @else
        <p class="mt-4">No posts yet</p>
    @endif

@endsection
