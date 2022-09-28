<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, Notifiable;

    public $table = 'patients';


    const INACTIVE = 0;
    const ACTIVE = 1;

    const STATUS_ARR = [
        self::ACTIVE => 'Activo',
        self::INACTIVE => 'Inactivo',
    ];

    public static $rules = [
        'name'    => 'required',
        'lastname'    => 'required',
        'bloodtype'    => 'required',
        'email'       => 'nullable|email:filter|unique:users,email|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/',
        'address'     => 'nullable|string',
    ];


}
