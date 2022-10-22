<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Title
        </h2>
    </x-slot>
</x-app-layout>


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

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <!-- card -->
                    <div class="card p-3">
                        <h2 class="mt-3">Add Title</h2>

                        <p class="card-text mb-3">Please fill out all the fields below and click on the "Submit" button to save the title record to the database.</p>
                        <hr>

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

                                <select name="themes" id="themes" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">

                                @foreach ($themes as $theme)


                                        <option value="{{$theme->theme}}">{{$theme->theme}} - {{$theme->description}}</option>

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
                    <button type="submit" class="btn btn-warning ">Create Blotter Report</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>


</body>

</html>
