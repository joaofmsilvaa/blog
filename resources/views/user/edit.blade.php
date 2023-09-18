@extends ('Components.layout')

@section('content')

    <div class="flex justify-center mt-3 p-8">
        <div class="p-8 w-3/4 justify-center bg-gray-50 rounded-xl">
            <h1 class="text-xl text-blue-600" >Edit profile</h1>
            <form method="POST" action="/profile/{{$user->id}}/update" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="flex flex-col items-center mt-6">
                    <div
                        class="sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-32 lg:h-32 w-24 h-24 rounded-full overflow-hidden object-cover">
                        <img
                            id="image_preview"
                            src="/storage/{{$user->profilePicture}}" alt="Preview"
                            alt="profile picture"
                            class="object-cover border-b-2 shadow-2xl"
                            :value="old('profilePicture', $user->profilePicture)"
                        >
                    </div>
                    <div class="flex mt-6">
                        <div class="flex-1">
                            <x-form.formInput name="profilePicture" type="file"/>
                        </div>
                    </div>
                </div>

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <x-form.formInput name="name" value="{{$user->name}}"/>

                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <x-form.formInput name="username" value="{{$user->username}}"/>

                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <x-form.textarea name="description">{{$user->description}}</x-form.textarea>

                <div class="flex justify-end mt-2 border-t border-gray-300">
                    <button type="submit"
                            class="bg-blue-500 mt-2 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        const profileImageInput = document.getElementById('profilePicture');
        const imagePreview = document.getElementById('image_preview');

        profileImageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    </script>
@endsection
