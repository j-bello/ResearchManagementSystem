<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Upload File
        </h2>

    </x-slot>


    <div>
        <div class="max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="card">

                    <form action="{{ route('titles.uploadfile') }}" method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="px-4 sm:p-6">
                        <div class="col align-self-center">
                            <label for="file" class="form-label"><b>Upload content</b></label>
                            <input type="file" class="form-control shadow-none  @error('docFile') is-invalid @enderror"
                                name="docFile">

                        </div>
                        <div class="col-auto align-self-end">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </div>
                    @error('docFile')
                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </form>

            </div>
        </div>
    </div>



</x-app-layout>
