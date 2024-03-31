<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamScore extends Model
{
    protected $table = 'team-score';
    protected $fillable = [
        "team-id",
        "event-id",
        "points"
        ];
    use HasFactory;
}
