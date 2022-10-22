<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Show Title
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->id }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Program
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->program }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->title }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->description }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Research Agenda
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->themes }}
                                    </td>
                                </tr>



                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Panelists
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->panelists }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Research Topics
                                    </th>



                                    @foreach ($title->tags as $tag)
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ $tag->name }}
                                        </td>
                                    @endforeach



                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Approved By
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->approvedBy }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Year
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $title->year }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        File
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <form action="{{ route('titles.upload', $title->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">

                                                @if ($file)
                                                    <div class="row">
                                                        @if (str_contains($file->file, 'pdf'))

                                                            <a class="btn btn-primary" data-bs-toggle="collapse"
                                                                href="#collapseExample" role="button"
                                                                aria-expanded="false" aria-controls="collapseExample">
                                                            </a>

                                                            <div class="collapse mt-3 mb-3" id="collapseExample">
                                                                <div class="card card-body">
                                                                    <iframe height="400" width="900" name="doc"
                                                                        src="/assets/{{ $file->file }}"></iframe>
                                                                </div>
                                                            </div>
                                                        @endif



                                                        <div class="mt-5" style="text-align: right;">


                                                    <a class="btn btn-success mt-3 mb-3 rounded py-2 px-4" style="background-color: rgb(228, 151, 57); color:white;" href="{{ route('titles.download', $file->file) }}" role="button"><i class="fa-thin fa-file-arrow-down"></i> Download </a>
                                                        </div>
                                                </div>

                                                @endif








                                                <div class="row">
                                                    <div class="col mt-5">
                                                        <label for="file" class="form-label"><b></b></label>
                                                        <input type="file"
                                                            class="form-control shadow-none  @error('docFile') is-invalid @enderror"
                                                            onchange="previewFile(this)" name="docFile">
                                                        <button type="submit"
                                                            class="hover:bg-gray-300 text-black font-bold py-2 px-4 rounded"
                                                            style="background-color: rgb(63, 179, 63); color:aliceblue;">Submit</button>

                                                    </div>
                                                </div>
                                                @error('docFile')
                                                    <small id="helpId"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
            <div class="block mt-8">
                <a href="{{ route('titles.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded"><i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
</x-app-layout>
