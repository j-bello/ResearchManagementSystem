<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-white leading-tight">
            Edit Theme
        </h2>
    </x-slot>
    <br> <br>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8" style="background-color: #00308F; border-radius: 5px;">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('themes.update', $theme->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="theme" class="block font-medium text-sm text-gray-700">Theme</label>
                            <input type="text" name="theme" id="theme" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('theme', $theme->theme) }}" />
                            @error('theme')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 sm:p-6" style="background-color: white;">
                            <label for="description" class="block font-medium text-sm text-gray-700"
                                >Description</label>
                            <input type="text" name="description" id="description" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('description', $theme->description) }}" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
