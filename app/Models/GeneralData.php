<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralData extends Model
{
    use HasFactory;

    public $fillable = ["gender", "status", "avg_rating", "attendance", "survey_id"];
}
