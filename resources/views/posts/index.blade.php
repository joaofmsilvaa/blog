@extends ('components.layout')

@section('content')

{{--    <div class="flex justify-center">
        <div class="p-8 w-3/4 justify-center">
            <div class="mt-3 rounded-xl border-b-2 p-3 bg-blue-50">
                @if($posts->count() > 0)

                    <div class="p-8 md:items-center justify-center lg:justify-start lg:items-start bg-gray-100 rounded-xl">
                        <div class="flex flex-col">
                            <img src="{{$posts[0]->thumbnail}}">
                        </div>
                    </div>

                    <div class="lg:grid-cols-3 sm:grid-cols-1 flex justify-center">
                        <div>
                            <div class="lg:grid lg:grid-cols-3">
                                @foreach($posts->skip(1) as $post)
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

        </div>
    </div>--}}

<div class="lg:flex justify-center mt-5">

    <x-featuredPost :post="$posts[0]"/>
    <div class="lg:ml-6 lg:mt-0 mt-7 2xl:w-3/12 lg:w-4/12 w-full flex lg:flex-col sm:flex-row flex-col items-center justify-between">
        <x-postLayout :post="$posts[1]"/>
        <x-postLayout :post="$posts[2]"/>
    </div>
</div>
@endsection
