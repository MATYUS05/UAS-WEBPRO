<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'time_end',
        'location',
        'class_id',
        'kaka_id',
    ];
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function children()
    {
        return $this->belongsToMany(Child::class, 'attendance', 'event_id', 'child_id');
    }

    public function classCategories()
    {
        return $this->belongsTo(ClassCategories::class, 'class_id');
    }

    public function kaka()
    {
        return $this->belongsTo(User::class, 'kaka_id');
    }
    
}
