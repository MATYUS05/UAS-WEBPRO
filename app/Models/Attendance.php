<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'event_id',
        'status',
    ];
    // protected $casts = [
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    // ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function classCategory()
    {
        return $this->belongsTo(ClassCategories::class, 'class_id');
    }
    
}
