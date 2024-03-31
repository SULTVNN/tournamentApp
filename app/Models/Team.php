<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team-leader',
        'member1',
        'member2',
        'member3',
        'member4',
        'team-name',
    ];
}
