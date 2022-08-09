<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Titles List') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-10">
                <a href="{{ route('titles.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Title</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Title</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Description</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Tags</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Approved By</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Year</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap">Actions</th>


                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($titles as $title)
                                <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$title->title}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$title->description}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$title->tags}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$title->approvedBy}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$title->year}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <a href="{{route('titles.show', $title->id)}}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                    <a href="{{route('titles.edit', $title->id)}}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                    <form class="inline-block" action="{{route('titles.destroy', $title->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
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
</x-app-layout>
