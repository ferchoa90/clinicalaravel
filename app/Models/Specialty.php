<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Specialty extends Model
{
    use HasFactory, Notifiable;

    const INACTIVE = 0;
    const ACTIVE = 1;

    const STATUS_ARR = [
        self::ACTIVE => 'Activo',
        self::INACTIVE => 'Inactivo',
    ];
}
