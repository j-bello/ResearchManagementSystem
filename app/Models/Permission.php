<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Permission extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = [
        'title',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
