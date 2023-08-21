@extends ('components.layout')

@section('content')
    <div class="lg:flex justify-center mt-5 p-5">

        <x-featuredPost :post="$posts[0]"/>
        <div
            class="lg:ml-6 lg:mt-0 mt-7 2xl:w-3/12 lg:w-4/12 w-full flex lg:flex-col sm:flex-row flex-col items-center justify-between">
            <x-subFeaturedPost :post="$posts[1]"/>
            <x-subFeaturedPost :post="$posts[2]"/>
        </div>
    </div>

    <div class="p-5 w-xl">
        @if($posts->count() > 0)

            <div class="lg:grid-cols-3 sm:grid-cols-1 flex justify-center">
                <div>
                    <div class="lg:grid lg:grid-cols-3 p-5">
                        @foreach($posts->skip(3) as $post)
                            <x-postLayout :post="$post"/>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="p-8">
                {{$posts->links()}}
            </div>
        @else
            <p class="my-4 text-xl">No posts yet :(</p>
        @endif
    </div>
@endsection
