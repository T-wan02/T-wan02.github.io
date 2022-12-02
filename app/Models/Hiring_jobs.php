<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring_jobs extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'role_id', 'requirement', 'company_id', 'interview_date', 'deadline'];

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class, 'hiring_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
