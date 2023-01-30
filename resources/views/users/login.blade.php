<x-layout :views="$views" :active-nav="$active_nav">
    
    <form action="/authenticate" method="POST" class="mt-12 mx-auto w-[911px] flex flex-col">
        @csrf
            <input
                type="text"
                name="username"
                placeholder="Email or username"
                value="{{old('username')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            <input
                type="password"
                name="password"
                placeholder="Password"
                value="{{old('password')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            <button 
                type="submit"
                class="mt-2 py-3 px-3 bg-gray-800 text-white whitespace-nowrap w-min rounded-sm"
            >
                Log in to your account
            </button>
    </form>
</x-layout>