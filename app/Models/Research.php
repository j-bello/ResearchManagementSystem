<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Research extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = ['theme_id', 'area'];

    public function theme(){
        return $this-> belongsTo(Theme::class);
    }
}
