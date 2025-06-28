<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'contact_email',
        'contact_phone',
        'description',
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
