<x-layout :views="$views" :active-nav="$active_nav">

    
    
    <form action="/users/create" method="POST" class="mt-16 px-4 mx-auto w-[911px] flex flex-col">
        @csrf
        @error('first_name')
            <p class="text-red-600 text-sm mb-2">{{$message}}</p>
        @enderror
        <input 
            name="first_name"
            type="text"
            placeholder="First name"
            value="{{old('first_name')}}"
            class="border text-xl px-4 py-3 mb-6 rounded-sm"
        >
        @error('last_name')
            <p class="text-red-600 text-sm mb-2">{{$message}}</p>
        @enderror
        <input
            name="last_name"
            type="text"   
            placeholder="Last name"
            value="{{old('last_name')}}"
            class="border text-xl px-4 py-3 mb-6 rounded-sm"
        >
        @error('email')
            <p class="text-red-600 text-sm mb-2">{{$message}}</p>
        @enderror
        <input 
            type="email"
            name="email"
            placeholder="Email address"
            value="{{old('email')}}"
            class="border text-xl px-4 py-3 mb-6 rounded-sm"
        >
        @error('username')
            <p class="text-red-600 text-sm mb-2">{{$message}}</p>
        @enderror
        <input 
            name="username"
            type="text" 
            placeholder="Username"
            value="{{old('username')}}"
            class="border text-xl px-4 py-3 mb-6 rounded-sm"
        >
        @error('password')
            <p class="text-red-600 text-sm mb-2">{{$message}}</p>
        @enderror
        <input 
            type="password"
            name="password"
            placeholder="Password"
            class="border text-xl px-4 py-3 mb-6 rounded-sm"
        >
        @error('password')
            <p class="text-red-600 text-sm mb-2">Confirm your password</p>
        @enderror
        <input 
            type="password"
            name="password_confirmation"
            placeholder="Confirm password"
            class="border text-xl px-4 py-3 mb-6 rounded-sm"
        >
        @error('terms_agreed')
            <p class="text-red-600 text-sm mb-2">You need to agree to the terms an conditions</p>
        @enderror
        <div class="flex">
            <input
                name="terms_agreed"
                type="checkbox"
                value="1"
                class="ml-2 mr-5 w-6 h-6 text-lg font-medium text-gray-900 dark:text-gray-300"
            >
            <label for="terms_agreed" class="text-lg">
                I agree to the terms and conditions.
            </label>
        </div>
        <button
            type="submit"
            class="mt-6 py-3 px-3 bg-gray-800 text-white whitespace-nowrap w-min rounded-sm"
        >
            Log in to your account
        </button>
    </form>
</x-layout>