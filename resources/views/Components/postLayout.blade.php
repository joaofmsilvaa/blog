@props(['post'])

<div class="mt-5 max-w-md bg-gray-200 p-5 rounded-xl transition-colors duration-300 hover:bg-gray-100">
    <h1 class="text-left text-xl font-semibold leading-normal text-gray-900 dark:text-white">{{$post->title}}</h1>
    <div class="mt-4 text-justify dark:text-gray-400">
        <p>{!!$post->excerpt!!}</p>
    </div>
</div>
