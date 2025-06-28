<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_id',
        'notes',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
