<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Show Theme
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
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $theme->id }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Theme
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $theme->theme }}
                                    </td>
                                </tr>


                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="block mt-8">
                <a href="{{ route('themes.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
</x-app-layout>