<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserColumn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'column_name',
        'column_type',
    ];

    public function scopeForUser($query, $user)
    {
        return $query->where('user_id', $user->id);
    }

    // Define any relationships or additional methods you need for the UserColumn model
}