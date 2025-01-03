<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'dob',
        'class',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classCategories()
    {
        return $this->belongsTo(ClassCategories::class, 'class');
    }
}