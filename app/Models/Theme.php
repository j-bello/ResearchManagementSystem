<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Theme extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = ['theme','description'];

    public function research(){
        return $this->hasMany(Research::class);
    }
}
