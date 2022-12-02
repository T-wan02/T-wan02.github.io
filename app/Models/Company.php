<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'website', 'email', 'slug', 'address'];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function hiring()
    {
        return $this->hasMany(Hiring_jobs::class);
    }

    public function interview()
    {
        return $this->hasMany(Interview::class);
    }

    public function quiteed_employee()
    {
        return $this->hasMany(Quitted_emplyees::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
