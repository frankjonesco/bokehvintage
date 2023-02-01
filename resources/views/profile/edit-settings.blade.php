<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>
        <div class="flex items-center">
            <h1 class="grow">Edit account settings</h1>
            <a href="/profile/password" class="btn">Update password</a>
        </div>
        <form action="/users/create" method="POST" class="mt-8 mx-auto w-[911px] flex flex-col">
            @csrf
            @error('first_name')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                name="first_name"
                type="text"
                placeholder="First name"
                value="{{old('first_name') ?: $user->first_name}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('last_name')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input
                name="last_name"
                type="text"   
                placeholder="Last name"
                value="{{old('last_name') ?: $user->last_name}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('email')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                type="email"
                name="email"
                placeholder="Email address"
                value="{{old('email') ?: $user->email}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('username')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                name="username"
                type="text" 
                placeholder="Username"
                value="{{old('username') ?: $user->username}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('password')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            
            <button
                type="submit"
                class="mt-2 py-3 px-3 bg-gray-800 text-white whitespace-nowrap w-min rounded-sm text-lg"
            >
                Update account information
            </button>
        </form>
    </x-container-thin>
</x-layout>