<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quitted_emplyees extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'slug', 'company_id', 'reason', 'desicion', 'pending_time', 'pending_reason'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
