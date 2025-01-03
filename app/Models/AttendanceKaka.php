<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceKaka extends Model
{
    use HasFactory;
    protected $table = 'attendances_kaka';
    protected $fillable = [
        'kaka_id',
        'event_id',
        'class_id',
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
        public function classCategory()
    {
        return $this->belongsTo(ClassCategories::class, 'class_id');
    }
    public function kaka()
{
    return $this->belongsTo(User::class, 'kaka_id');
}



}
