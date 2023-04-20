<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back</a>
            </div>
            <div class="p-2 m-2 bg-slate-100 rounded">

                <form action="{{ route('admin.reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('first_name') border-red-400 @enderror">
                        @error('first_name')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6"> @error('price')
                            border-red-400
                        @enderror
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('last_name') border-red-400 @enderror">
                        @error('last_name')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') border-red-400 @enderror">
                        @error('email')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="tel_number" class="block mb-2 text-sm font-medium text-gray-900">Phone
                            number</label>
                        <input type="text" id="tel_number" name="tel_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('tel_number') border-red-400 @enderror">
                        @error('tel_number')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="res_date" class="block mb-2 text-sm font-medium text-gray-900">Reservation
                            date</label>
                        <input type="datetime-local" id="res_date" name="res_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('res_date') border-red-400 @enderror">
                        @error('res_date')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="table_id" class="block mb-2 text-sm font-medium text-gray-900">
                            Table</label>
                        <select name="table_id" id="table_id" class="form-multiselect block w-full mt-1">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }}</option>
                            @endforeach


                        </select>
                        @error('table_id')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900">Guest
                            number</label>
                        <input type="number" id="guest_number" name="guest_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('guest_number') border-red-400 @enderror"
                            min="1" max="15" step="1">
                        @error('guest_number')
                            <div class="alert alert-danger text-red-400 ">{{ $message }}</div>
                        @enderror
                    </div>




                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
