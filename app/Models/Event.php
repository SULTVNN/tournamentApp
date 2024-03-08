<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event-name',
        'event-description',
        'number-of-individuals',
        'number-of-teams',
        'points',
        'tournament-id',
    ];
    use HasFactory;
}
