<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back</a>
            </div>
            <div class="p-2 m-2 bg-slate-100 rounded">

                <form action="{{ route('admin.tables.update', $table->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Table name</label>
                        <input type="name" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-400 @enderror"
                            value="{{ $table->name }}">
                        @error('name')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900">Guest
                            number</label>
                        <input type="number" id="guest_number" name="guest_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('guest_number') border-red-400 @enderror"
                            min="1" max="15" step="1" value="{{ $table->guest_number }}">
                        @error('guest_number')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select
                            Categories</label>
                        <select name="status" id="status" class="form-multiselect block w-full mt-1">
                            @foreach (App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>
                                    {{ $status->name }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                        <select name="location" id="location" class="form-multiselect block w-full mt-1">
                            @foreach (App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>
                                    {{ $location->name }}</option>
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
