<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    // Specify the fillable fields
    protected $fillable = [
        'name', 
        'email', 
        'phone',
    ];

    // Add relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}