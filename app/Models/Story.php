<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class story extends Model
{
    protected $fillable = [
        'title',
        'text',
        'user_id'
    ];

    public function user()
    {    
        return $this->belongsTo(User::class);
    }
}
