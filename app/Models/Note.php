<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'notes',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
