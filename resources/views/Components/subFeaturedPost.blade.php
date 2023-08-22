@props(['post'])


<div class="lg:w-auto sm:w-1/2 mt-5 px-2">
    <img src="/images/illustration1.png" alt="flying letters" class="w-full" />
    <div class="mt-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <p class="text-base leading-4 text-gray-500 dark:text-gray-200"><time>{{$post->created_at->diffForHumans()}}</time></p>
                <p class="text-base leading-none text-gray-500 dark:text-gray-200 ml-12">{{$post->category->name}}</p>
            </div>
            <div class="flex items-center">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/blog-4-svg1.svg" alt="line" />
                <p class="text-base leading-none text-gray-500 dark:text-gray-200 ml-2">{{$post->author->name}}</p>
            </div>
        </div>
        <h1 class="text-2xl font-semibold leading-6 mt-4 text-gray-800">{!! $post->title !!}</h1>
        <div class="text-base text-justify leading-6 text-gray-600 dark:text-gray-200 mt-2">
            {!! $post->excerpt !!}
        </div>

    </div>
</div>
