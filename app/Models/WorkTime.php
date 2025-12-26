<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'hours', 'emp_id', 'project_id', 'modul_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
