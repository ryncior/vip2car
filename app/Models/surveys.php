<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveys extends Model
{
    /** @use HasFactory<\Database\Factories\SurveysFactory> */
    use HasFactory;
    protected $primarykey = "id";
}
