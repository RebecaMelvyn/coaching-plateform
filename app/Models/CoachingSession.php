<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CoachingSession extends Model
{
    use HasFactory;

    protected $table = 'sessions';

    protected $fillable = [
        'title',
        'description',
        'type',
        'start_time',
        'end_time',
        'coach_id',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'registrations', 'session_id', 'user_id')
            ->withTimestamps();
    }
}
