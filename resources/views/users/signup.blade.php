<x-layout :meta="$meta" :active-nav="$active_nav">
    {{-- <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="582337696687-3ks3c3pelu5og465mg115qnndrmlhg6v.apps.googleusercontent.com">
    <script>
        function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        }
    </script> --}}
    <x-container-thin>
        <h1>Join the community to share your own experiments and see what others photographers are doing.</h1>
        {{-- <div class="g-signin2" data-onsuccess="onSignIn"></div> --}}
        <form action="/users/create" method="POST" class="mt-8 mx-auto w-[911px] flex flex-col">
            @csrf
            @error('first_name')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                name="first_name"
                type="text"
                placeholder="First name"
                value="{{old('first_name')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('last_name')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input
                name="last_name"
                type="text"   
                placeholder="Last name"
                value="{{old('last_name')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('email')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                type="email"
                name="email"
                placeholder="Email address"
                value="{{old('email')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('username')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                name="username"
                type="text" 
                placeholder="Username"
                value="{{old('username')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('password')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                type="password"
                name="password"
                placeholder="Password"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('password')
                <p class="text-red-600 text-sm mb-2">Confirm your password</p>
            @enderror
            <input 
                type="password"
                name="password_confirmation"
                placeholder="Confirm password"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('terms_agreed')
                <p class="text-red-600 text-sm mb-2">You need to agree to the terms an conditions</p>
            @enderror
            <div class="flex">
                <input
                    name="terms_agreed"
                    type="checkbox"
                    value="1"
                    class="mt-2 ml-2 mr-5 w-6 h-6 text-lg font-medium !outline-red-500 accent-lime-400 text-gray-900"
                >
                <label for="terms_agreed" class="text-lg mt-2">
                    I agree to the terms and conditions.
                </label>
            </div>
            <button
                type="submit"
                class="mt-7 py-3 px-3 bg-gray-800 text-white whitespace-nowrap w-min rounded-sm"
            >
                Complete sign up
            </button>
        </form>
    </x-container-thin>
</x-layout>