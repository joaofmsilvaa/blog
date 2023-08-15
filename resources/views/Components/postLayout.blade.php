@props(['post'])

<div class="mt-5 max-w-md shadow-md bg-gray-100 p-5 rounded-xl transition-colors duration-300 hover:bg-gray-50">
    <img class="rounded-t-xl rounded-b" src="/images/illustration1.png" alt="illustration">

    <h1 class="text-left text-xl mt-2 font-semibold leading-normal text-gray-900 dark:text-white">{{$post->title}}</h1>
    <div class="mt-4 text-justify dark:text-gray-400">
        <p>{!!$post->excerpt!!}</p>
    </div>
</div>
