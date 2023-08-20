@props(['posts'])


@if($posts->count() > 0)
    <div class="lg:grid-cols-3 sm:grid-cols-1 flex justify-center">
        <div>
            <div class="lg:grid lg:grid-cols-3">
                @foreach($posts as $post)
                    <x-postLayout :post="$post"/>
                @endforeach
            </div>
        </div>
    </div>

    <div class="p-8">
        {{$posts->links()}}
    </div>
@else
    <p class="my-4 text-xl">No posts yet</p>
@endif
