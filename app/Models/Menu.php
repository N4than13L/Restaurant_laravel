<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'menus';

    protected $fillable = [
        'id',
        'name',
        'amount',
        'users_id'
    ];

    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
