<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = ['theme_id', 'area'];

    public function theme(){
        return $this-> belongsTo(Theme::class);
    }
}
