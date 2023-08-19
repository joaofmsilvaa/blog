@props(['posts'])

@if($posts->count() > 1)
    <div class="lg:grid-cols-3 sm:grid-cols-1">
        <div class="p-8">
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
    <p class="mt-4">No posts yet</p>
@endif
