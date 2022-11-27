<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-white leading-tight">
            Edit Title
        </h2>
    </x-slot>


    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
            rel="stylesheet" />
        <style>
            .bootstrap-tagsinput .tag {
                margin-right: 2px;
                color: #ffffff;
                background: #000000;
                padding: 3px 7px;
                border-radius: 3px;
            }

            .bootstrap-tagsinput {
                width: 100%;
                line-height: 30px;
            }
        </style>
    </head>

    <body>
<br><br>

        <div>

            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="background-color: #00308F; border-radius: 5px;">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="post" action="{{ route('titles.update', $title->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="program" class="block font-medium text-sm text-gray-700">Program</label>
                                <select name="program" id="program"
                                    class="form-multiselect block rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('program', $title->program) }}">
                                    <option selected disabled>Select Program</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="IS">Information Systems</option>
                                    <option value="EMC">Entertainment and Mobile Computing</option>
                                </select>
                                @error('program')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                                <input type="text" name="title" id="title" type="text"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('title',  $title->title) }}" />
                                @error('title')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="description"
                                    class="block font-medium text-sm text-gray-700">Abstract</label>

                                    <textarea name="description" id="description"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('description', $title->description) }}" > </textarea>


                                @error('description')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>





                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="tags" class="block font-medium text-sm text-gray-700">Research
                                    Topics</label>
                                <input type="text" name="tags" id="tags" type="text"  data-role="tagsinput"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('tags', '') }}" />
                                @error('tags')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="px-4 sm:p-6" style="background-color: white;">
                                <label for="themes" class="block font-medium text-sm text-gray-700"
                                    style="font-weight: bold;">Themes</label>

                                <select name="themes" id="themes"
                                    class="form-multiselect block rounded-md shadow-sm mt-1 block w-full"
                                     value="{{ old('themes',  $title->themes) }}">

                                    @foreach ($themes as $theme)
                                        <option value="{{ $theme->theme }}">{{ $theme->theme }} -
                                            {{ $theme->description }}</option>
                                    @endforeach

                                </select>
                                @error('themes')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="adviser" class="block font-medium text-sm text-gray-700">Adviser</label>
                                <input type="text" name="adviser" id="adviser" type="text"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('adviser',  $title->adviser) }}" />
                                @error('adviser')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="year" class="block font-medium text-sm text-gray-700">Year</label>
                                <input type="text" name="year" id="year" type="text"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('year',  $title->year) }}" />
                                @error('year')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>



    </body>

    </html>
</x-app-layout>
