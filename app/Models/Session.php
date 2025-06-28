<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'duration',
        'location',
        'company_id',
        'max_participants',
        'coach_id'
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];

    protected $table = 'coaching_sessions';

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'session_participants')
            ->withTimestamps();
    }

    public function getRegistrationsCountAttribute()
    {
        return $this->participants()->count();
    }
}
