<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{    
    use HasFactory;
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_module', 'module_id', 'project_id');
    }

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'module_id');
    }
}
