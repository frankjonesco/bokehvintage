<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>
        <div class="flex items-center">
            <h1 class="grow">Edit account settings</h1>
            <a href="/profile/password" class="btn">Update password</a>
        </div>
        <form action="/profile/password/update" method="POST" class="mt-8 mx-auto w-[911px] flex flex-col">
            @csrf
            <input type="hidden" name="hex" value="{{$user->hex}}">
            @error('old_password')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                type="password"
                name="old_password"
                placeholder="Old password"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('password')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                type="password"
                name="password"
                placeholder="New password"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('password')
                <p class="text-red-600 text-sm mb-2">Confirm your password</p>
            @enderror
            <input 
                type="password"
                name="password_confirmation"
                placeholder="Confirm new password"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            <button
                type="submit"
                class="mt-2 py-3 px-3 bg-gray-800 text-white whitespace-nowrap w-min rounded-sm text-lg"
            >
                Complete registration
            </button>
        </form>
    </x-container-thin>
</x-layout>