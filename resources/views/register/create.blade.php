@extends ('Components.layout')

@section('content')

    <section class="px-6 py-8 mt-10">
        <h1 class="mb-5 text-3xl text-bold text-blue-600">Create your account</h1>
        <main class="max-w-xl mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <form method="POST" action="/register" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col items-center mt-6">
                    <div
                        class="sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-32 lg:h-32 w-24 h-24 rounded-full overflow-hidden object-cover">
                        <img
                             id="image_preview"
                             src="/storage/profilePictures/defaultImage.jpg" alt="Preview"
                             alt="profile picture"
                             class="object-cover border-b-2 shadow-2xl"
                        >
                    </div>
                    <div class="flex mt-6">
                        <div class="flex-1">
                            <x-form.formInput name="profilePicture" type="file"/>
                        </div>
                    </div>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text"
                               name="name"
                               value="{{old('name')}}"
                               id="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="John"
                               required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input
                            type="text"
                            name="username"
                            value="{{old('username')}}"
                            id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John"
                            required>
                        @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                    <input
                        type="email"
                        name="email"
                        value="{{old('email')}}"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com"
                        required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••"
                        required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6 text-center">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Register
                    </button>
                </div>

            </form>
        </main>
    </section>


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
