<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


            <form method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                        placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                </div>
            </form>





            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Title</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Description</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Approved By</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Year
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>
