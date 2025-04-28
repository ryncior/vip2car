<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responses extends Model
{
    /** @use HasFactory<\Database\Factories\ResponsesFactory> */
    use HasFactory;
    protected $fillable = [
        'survey_id', // Add this
        'submitted_at',
        // Other fillable fields
    ];
}
