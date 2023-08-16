@extends ('components.layout')

@section('content')

    <section class="px-6 py-8 mt-10">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <form method="POST" action="/sessions">
                @csrf

<<<<<<< Updated upstream
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        E-mail
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           value="{{old('email')}}"
                           id="email"
                           required
                    >
=======
        <main class="max-w-xl mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <form method="POST" action="/sessions">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        address</label>
                    <input type="email"
                           name="email"
                           value="{{old('email')}}"
                           id="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="john.doe@company.com"
                           required>
>>>>>>> Stashed changes
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
<<<<<<< Updated upstream
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required
                    >
=======
                    <label for="password"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="•••••••••"
                           required>
>>>>>>> Stashed changes
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6 text-center">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Log-in
                    </button>
                </div>

            </form>
        </main>
    </section>

@endsection
