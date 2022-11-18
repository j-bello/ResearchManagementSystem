<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Title extends Model
{

    use HasFactory;
    use Loggable;

    protected $table = "titles";
    use Searchable;

    use \Conner\Tagging\Taggable;
    protected $fillable = ['user_number','program','title','description','year','themes'];


    public function file(){
        return $this->hasOne(File::class);
    }



}
