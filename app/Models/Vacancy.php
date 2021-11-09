<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    /**
     * The skills that belong to the vacancy.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
