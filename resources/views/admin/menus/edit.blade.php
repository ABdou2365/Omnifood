<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back</a>
            </div>
            <div class="p-2 m-2 bg-slate-100 rounded">

                <form enctype="multipart/form-data" action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Menu name</label>
                        <input type="name" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-400 @enderror"
                            value="{{ $menu->name }}">
                        @error('name')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Menu
                            image</label>
                        <img src="{{ Storage::url($menu->image) }}" class="w-16 h-16 mb-6">

                        <input type="file" id="image" name="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('image') border-red-400 @enderror">
                        @error('image')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" id="price" name="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('price') border-red-400 @enderror"
                            min="0" max="10000.00" step="0.01" value="{{ $menu->price }}">
                        @error('price')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Description</label>
                        <textarea type="text" id="description" name="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('description') border-red-400 @enderror ">{{ $menu->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="Categories" class="block mb-2 text-sm font-medium text-gray-900">Select
                            Categories</label>
                        <select name="Categories[]" id="Categories" class="form-multiselect block w-full mt-1" multiple>
                            @foreach ($Categories as $category)
                                {
                                <option value="{{ $category->id }}" @selected($menu->Categories->contains($category))>{{ $category->name }}
                                </option>
                                }
                            @endforeach
                        </select>
                    </div>


                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
