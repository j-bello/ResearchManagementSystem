<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
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



    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet" />



    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #00308F;
            background: #00308F;
            padding: 3px 7px;
            border-radius: 3px;
        }

        .bootstrap-tagsinput {
            width: 100%;
            line-height: 30px;

        }

        .shadow {
    box-shadow: 0;
}


    </style>

</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-white leading-tight">
            Themes List
        </h2>

    </x-slot>

    <body style="background-image: url(/uploads/bgfinal.png); background-size: 100% 100%; background-repeat: no-repeat;">
@include('sweetalert::alert')


    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Button trigger modal -->
            <button type="button"
                class="bg-green-500 hover:bg-green-700 text-sm text-white font-bold py-2 px-4 rounded ml-4"
                style="background-color: #228c22;" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fa-sharp fa-solid fa-book"></i> &nbspAdd Theme
            </button>

            <a href="{{ route('pdf.themePDF') }}" class="text-sm text-white font-bold py-2 px-4 rounded ml-2"
            style="background-color: rgb(0, 3, 158);"><i class="fa-solid fa-file-pdf"></i> &nbspPDF</a>



            <!--CREATE TITLE-->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Create Theme</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <!-- card -->
                            <div class="card p-3">

                                <!-- form -->
                                <form method="POST" action="{{ route('themes.store') }}" enctype="multipart/form-data"
                                    id="form">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="theme" class="block font-medium text-sm text-gray-700">Theme</label>
                                        <input type="text" name="theme" id="theme"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('theme', '') }}" />
                                        @error('theme')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description"
                                            class="block font-medium text-sm text-gray-700">Description</label>
                                        <input type="text" name="description" id="description" type="text"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('description', '') }}" />
                                        @error('description')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>


                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning text-light"
                                style="background-color: rgb(0, 3, 158); border-color: rgb(0, 3, 158);">Create
                                Theme</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="background:#00308F">

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" style="background:#FFFFFF">

                                <div class="container mt-3 mb-3">

                                <table class="table table-bordered data-table" id="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 font-medium text-left text-white whitespace-nowrap">
                                                ID</th>
                                            <th scope="col"
                                                class="px-6 py-3 font-medium text-left text-white whitespace-nowrap">
                                                Theme</th>
                                            <th scope="col"
                                                class="px-6 py-3 font-medium text-left text-white whitespace-nowrap">
                                                Description</th>
                                            <th scope="col"
                                                class="px-6 py-3 font-medium text-left text-white whitespace-nowrap">
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
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true
                , serverSide: true
                , ajax: "{{ route('themes.index') }}"
                , columns: [{
                        data: 'id'
                        , name: 'id'
                    }
                    , {
                        data: 'theme'
                        , name: 'theme'
                    }
                    , {
                        data: 'description'
                        , name: 'description'
                    },


                    {
                        data: 'action'
                        , name: 'action'
                        , orderable: false
                        , searchable: false
                    }
                , ]
            });

        });

    </script>

        </x-app-layout>
        </body >

            </html>


            <style>

#data-table {


           background:#00308F;





            }
            </style>
