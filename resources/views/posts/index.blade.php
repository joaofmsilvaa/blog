@extends ('components.layout')

@section('content')

    @if($posts->count() > 1)
        <div class="grid-cols-3">
            <div class="p-8">

                <x-postLayout :post="$posts[0]"/>

                <div class="lg:grid lg:grid-cols-3">
                    @foreach($posts->skip(1) as $post)
                        <x-postLayout :post="$post"/>
                    @endforeach
                </div>
            </div>
        </div>

    @else
        <p class="mt-4">No posts yet</p>
    @endif

@endsection
