<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function hiringJob()
    {
        return $this->hasMany(Hiring_jobs::class);
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function interview()
    {
        return $this->hasMany(Interview::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
