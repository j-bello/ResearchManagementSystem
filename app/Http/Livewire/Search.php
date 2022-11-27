<?php

namespace App\Http\Livewire;
use App\Models\Title;
use Livewire\WithPagination;

use Livewire\Component;

class Search extends Component
{
    use WithPagination;
    public $search = '';
  //  public $titles = 'titles';
  public  $program, $title, $description, $title_id, $year, $adviser, $themes;


    public function render()
    {
      
        return view('livewire.search', [
          'titles' => Title::where('title', 'like', '%'.$this->search.'%')
          ->orWhere('adviser', 'like', '%'.$this->search.'%')
          ->orWhere('themes', 'like', '%'.$this->search.'%')
          ->orWhere('program', 'like', '%'.$this->search.'%')
          ->orWhere('year', 'like', '%'.$this->search.'%')->paginate(5),



      ]);


    }

    public function show($id)
    {
        $title = Title::find($id);
        //dd($title);
      //  $this->title = $title;


        return view('livewire.show',compact('title'));


    }




}
