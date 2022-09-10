<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Title
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('titles.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('title', '') }}" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <input type="text" name="description" id="description" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('description', '') }}" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="panelists" class="block font-medium text-sm text-gray-700">Panelists</label>
                            <input type="text" name="panelists" id="panelists" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('panelists', '') }}" />
                            @error('panelists')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="tags" class="block font-medium text-sm text-gray-700">Tags</label>
                            <input type="text" name="tags" id="tags" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('tags', '') }}" />
                            @error('tags')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="approvedBy" class="block font-medium text-sm text-gray-700">Approved By</label>
                            <input type="text" name="approvedBy" id="approvedBy" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('approvedBy', '') }}" />
                            @error('approvedBy')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="year" class="block font-medium text-sm text-gray-700">Year</label>
                            <input type="text" name="year" id="year" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('year', '') }}" />
                            @error('year')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>







                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


