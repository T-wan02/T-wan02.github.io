<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'email', 'phone', 'address', 'resume', 'role_id', 'estimated_salary', 'status', 'company_id', 'hiring_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function hiring()
    {
        return $this->belongsTo(Hiring_jobs::class, 'hiring_id');
    }

    public function interview()
    {
        return $this->hasMany(Interview::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
