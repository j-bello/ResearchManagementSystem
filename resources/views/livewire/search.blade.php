<div class="py-12">
    <div class="max-w-screen-full mx-auto sm:px-6 lg:px-5">
        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <input type="text" class="float-none bg-white-300 text-black font-bold py-2 px-4 rounded my-3 border-black"
                style="width: 100%; border: 2px solid #00039e; " placeholder="Search" wire:model="search" />


<div class="mb-2 flex justify-end">

</div>

            <div>

                <table class="table-fixed mt-5" style="width: 100%;">
                    <tbody>
                        @foreach ($titles as $title)
                            <tr>
                                <td class="border border-black px-4 py-2 text-left w-full " onclick="window.location='{{ route('titles.show', $title->id) }}'" style="cursor: pointer;">

                                    <strong>Title: </strong> <i> {{ $title->title }}</i>
                                    <br>
                                    <strong>Abstract: </strong> {{ $title->description }}
                                    <br>
                                    <strong>Adviser: </strong> {{ $title->adviser }}
                                    <br>
                                    <strong>Theme: </strong> {{ $title->themes }}
                                    <br>
                                    <strong>Year: </strong> {{ $title->year }}
                                    <br>

                                </td>




                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{ $titles->links() }}


            </div>

        </div>
    </div>
</div>



</html>
