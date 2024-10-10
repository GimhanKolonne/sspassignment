<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrokerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_number',
        'years_experience',
        'specializations',
        'certifications',
        'education',
        'bio',
        'services',
        'areas_served',
        'profile_picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
