{{-- Trigger --}}
<div x-data="{show:false}" @click.away="show = false" class="absolute">
    <div @click="show = ! show">
{{--{{auth()->user()->username--}}
        daekjdkaedkjajdeadeadeadea
</div>

{{-- Links --}}
<div x-show="show" class="py-1 absolute bg-gray-100 w-full mt-2 rounded-xl w-full z-50 overflow-auto max-h-52"
 x-transition
 style="display: none">
{{ $slot }}
</div>
</div>
