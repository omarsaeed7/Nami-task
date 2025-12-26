<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
        use HasFactory;
    protected $fillable = ['name'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project', 'project_id', 'emp_id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'project_module', 'project_id', 'module_id');
    }

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'project_id');
    }
}
