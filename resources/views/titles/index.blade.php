<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Titles List
        </h2>

    </x-slot>


    <div>
        <div class="max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Button trigger modal -->
            <button type="button"
                class="bg-green-500 hover:bg-green-700 text-sm text-white font-bold py-2 px-4 rounded ml-4"  style="background-color: rgb(228, 151, 57);"
                data-toggle="modal" data-target="#staticBackdrop">
                <i class="fa-solid fa-plus"></i> Add Title
            </button>


            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Create Title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <!-- card -->
                            <div class="card p-3">

                                <!-- form -->
                                <form method="POST" action="{{route('titles.store')}}" enctype="multipart/form-data" id="form">
                                    @csrf
                                    <div class="mb-3" id="textboxDiv">
                                        <label for="program" class="block font-medium text-sm text-gray-700" style="font-weight: bold;">Program</label>
                                        <select name="program" id="program" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                                <option value="">Select Program</option>
                                                <option value="CS">Computer Science</option>
                                                <option value="IT">Information Technology</option>
                                                <option value="IS">Information Systems</option>
                                                <option value="EMC">Entertainment and Mobile Computing</option>
                                        </select>
                                        @error('program')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror

                                    </div>


                                    <div class="mb-3">
                                        <label for="title" class="block font-medium text-sm text-gray-700"
                                        style="font-weight: bold;">Title</label>
                                    <input type="text" name="title" id="title" type="text"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('title', '') }}" />
                                    @error('title')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="block font-medium text-sm text-gray-700"
                                        style="font-weight: bold;">Description</label>
                                    <input type="text" name="description" id="description" type="text"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('description', '') }}" />
                                    @error('description')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="panelists" class="block font-medium text-sm text-gray-700"
                                        style="font-weight: bold;">Panelists</label>
                                    <input type="text" name="panelists" id="panelists" type="text"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('panelists', '') }}" />
                                    @error('panelists')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3" id="textboxDiv">
                                        <label for="tags" class="block font-medium text-sm text-gray-700"
                                        style="font-weight: bold;">Research Topics</label>
                                    <input type="text" name="tags" id="tags" type="text" data-role="tagsinput"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('tags', '') }}" />
                                    @error('tags')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="themes" class="block font-medium text-sm text-gray-700" style="font-weight: bold;">Themes</label>

                                        <select name="themes" id="themes" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">

                                            <option selected disabled>Select Theme</option>

                                        @foreach ($themes as $theme)


                                                <option value="{{$theme->theme}}">{{$theme->theme}}</option>

                                        @endforeach

                                        </select>
                                        @error('themes')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="approvedBy" class="block font-medium text-sm text-gray-700"
                                        style="font-weight: bold;">Approved By</label>
                                    <input type="text" name="approvedBy" id="approvedBy" type="text"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('approvedBy', '') }}" />
                                    @error('approvedBy')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="year" class="block font-medium text-sm text-gray-700"
                                        style="font-weight: bold;">Year</label>
                                    <input type="text" name="year" id="year" type="text"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('year', '') }}" />
                                    @error('year')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>


                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning ">Create Title</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <div>
                <div class="max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    ID</th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Title</th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Description</th>

                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Agenda</th>

                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Panelists</th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Approved By</th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Year
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($titles as $title)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $title->titlecode }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $title->title }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $title->description }}</td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $title->themes }}</td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $title->panelists }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $title->approvedBy }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $title->year }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">






                                                        <a href="{{ route('titles.show', $title->id) }}"
                                                            class="text-green-600 hover:text-green-900 mb-2 mr-2"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('titles.edit', $title->id) }}"
                                                            class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2"><i
                                                                class="fa-solid fa-user-pen"></i></a>
                                                        <form class="inline-block"
                                                            action="{{ route('titles.destroy', $title->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure?');">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="submit" title="delete"
                                                                style="border: none; background-color:transparent;">
                                                                <i class="fas fa-trash text-red-600"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>
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
</x-app-layout>
</body>
