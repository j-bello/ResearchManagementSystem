<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class File extends Model
{
    use HasFactory;
    use Searchable;


    public function title(){
        return $this-> belongsTo(Title::class);
    }
}
