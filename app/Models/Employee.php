<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'salary'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project', 'emp_id', 'project_id');
    }

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'emp_id');
    }
}
