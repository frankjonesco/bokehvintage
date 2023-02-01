<x-layout :active-nav="$active_nav">
    <x-container-thin>
        <h1>Add a camera to your collection</h1>
        <form action="/cameras/store" method="POST" class="mt-12 flex flex-col">
            @csrf
            @error('brand')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                name="brand"
                type="text"
                placeholder="Brand"
                value="{{old('brand')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            @error('brand')
                <p class="text-red-600 text-sm mb-2">{{$message}}</p>
            @enderror
            <input 
                name="model"
                type="text"
                placeholder="Model"
                value="{{old('model')}}"
                class="border border-gray-400 text-xl px-4 py-3 mb-6 rounded-sm"
            >
            <button
                type="submit"
                class="mt-7 py-3 px-3 bg-gray-800 text-lg text-white whitespace-nowrap w-min rounded-sm"
            >
                Add to my cameras
            </button>
        </form>
    </x-container-thin>
</x-layout>