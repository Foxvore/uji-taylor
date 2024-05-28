<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'm_admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'name',
        'username',
        'password'
    ];
    protected $hidden = [
        'password'
    ];
}
