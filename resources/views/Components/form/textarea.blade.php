@props(['name'])

<div class="mt-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="{{$name}}">{{ucwords($name)}}</label>

    <textarea name="{{$name}}"
              class="border border-gray-200 p-2 w-full rounded"
              for="{{$name}}"
              required>{{$slot ?? old($name)}}</textarea>

    @error($name)
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
    @enderror
</div>
