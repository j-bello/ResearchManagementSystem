<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Title extends Model
{

    use Searchable;

    use \Conner\Tagging\Taggable;
    protected $fillable = ['user_number','program','titlecode','title','description','panelists','approvedBy','year','themes'];


    public function file(){
        return $this->hasOne(File::class);
    }


   
}
