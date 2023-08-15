@extends ('components.welcome')

@section('content')

    @if($posts->count())
        @foreach($posts as $post)
            <p>{{$post->title}}</p>
        @endforeach

    @else
        <p class="mt-4">No posts yet</p>
    @endif

@endsection
