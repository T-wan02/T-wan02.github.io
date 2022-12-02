<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'salary', 'email', 'resume', 'role_id', 'result', 'company_id', 'enrollment_id', 'status'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
