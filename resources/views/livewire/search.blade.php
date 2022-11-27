

<div class="py-12">
    <div class="max-w-screen-full mx-auto sm:px-6 lg:px-5">
        <div>


            <img src="/uploads/logofinal.png" class="logo" id="logofinal">
            <div>
            <input type="text" class="float-none bg-white-300 text-black font-bold py-2 px-4 rounded my-3 border-black"
            style="width: 100%; border: 2px solid #00039e;" placeholder="Enter keywords or title" id="search" wire:model="search" oninput="hidediv()"/>

            </div>


        </div>
        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">


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
</div>


</html>

<style>

    .logo {
  display: block;
  margin-left: auto;
  margin-right: auto;
  max-width:100%;
  height: 12rem;
}

#search {
  display: block;
  margin-left: auto;
  margin-right: auto;
  max-width:70%;

}

</style>

<script type="text/javascript">
   function hidediv() {
  document.getElementById("logo2").style.display = "none";
    }
</script>
