<x-layout :active-nav="$active_nav">
    <form action="/users/create" method="POST" class="mt-12 mx-auto w-[911px] flex flex-col">
        @csrf
        @error('first_name')
            <p class="text-red-600 text-sm mb-2">{{$message}}</p>
        @enderror
        <input 
            name="brand"
            type="text"
            placeholder="Camera brand"
            value="{{old('first_name')}}"
            class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
        >
        <input 
            name="model"
            type="text"
            placeholder="Camera mondel"
            value="{{old('first_name')}}"
            class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
        >
        <input 
            name="year"
            type="text"
            placeholder="Year of release"
            value="{{old('first_name')}}"
            class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
        >
        @error('last_name')
            <p class="text-red-600 text-sm mb-2">{{$message}}</p>
        @enderror
        <button
            type="submit"
            class="py-3 px-3 bg-gray-800 text-white whitespace-nowrap w-min rounded-sm"
        >
            Save to my cameras
        </button>
    </form>
</x-layout>