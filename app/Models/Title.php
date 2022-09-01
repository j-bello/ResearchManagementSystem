<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use \Conner\Tagging\Taggable;
    protected $fillable = ['user_number','title','description','approvedBy','year'];
}
