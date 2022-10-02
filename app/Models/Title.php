<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use \Conner\Tagging\Taggable;
    protected $fillable = ['user_number','program','titlecode','title','description','panelists','approvedBy','year'];


    public function file(){
        return $this->hasOne(File::class);
    }


}
