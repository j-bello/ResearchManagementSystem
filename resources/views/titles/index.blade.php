<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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



    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />



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

    @include('sweetalert::alert')

    <div>
        <div class="max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Button trigger modal -->
            <button type="button"
                class="bg-green-500 hover:bg-green-700 text-sm text-white font-bold py-2 px-4 rounded ml-4"  style="background-color: rgb(0, 3, 158);"
                data-toggle="modal" data-target="#staticBackdrop">
                <i class="fa-solid fa-plus"></i> Add Title
            </button>



<!--CREATE TITLE-->
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning text-light" style="background-color: rgb(0, 3, 158); border-color: rgb(0, 3, 158);">Create Title</button>
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

                                    <div class="container mt-3 mb-3" >
                                    <table class="table table-bordered data-table" id="data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    ID</th>
                                                    <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Program</th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Title</th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Abstract</th>



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
                                                    Agenda</th>
                                                <th scope="col"
                                                    class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">
                                                    Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    </div>
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




                <script type="text/javascript">
                    $(function () {

                      var table = $('.data-table').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: "{{ route('titles.index') }}",
                          columns: [
                              {data: 'id', name: 'id'},
                              {data: 'program', name: 'program'},
                              {data: 'title', name: 'title'},
                              {data: 'description', name: 'description'},

                              {data: 'panelists', name: 'panelists'},
                              {data: 'approvedBy', name: 'approvedBy'},
                              {data: 'year', name: 'year'},
                              {data: 'themes', name: 'themes'},

                              {data: 'action', name: 'action', orderable: false, searchable: false},
                          ]
                      });

                    });







                  </script>
</x-app-layout>
</body>

</html>
