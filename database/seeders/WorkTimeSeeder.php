<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Module;
use App\Models\Project;
use App\Models\WorkTime;
use Illuminate\Database\Seeder;

class WorkTimeSeeder extends Seeder
{
public function run(): void
    {
        $employees = Employee::all();
        $projects = Project::all();
        $modules = Module::all();

        foreach ($employees as $employee) {
            $assignedProjects = $projects->random(rand(2, 3));
            foreach ($assignedProjects as $project) {
                $employee->projects()->syncWithoutDetaching($project->id);

                $assignedModules = $modules->random(rand(1, 2));
                foreach ($assignedModules as $module) {
                    $project->modules()->syncWithoutDetaching($module->id);

                    WorkTime::create([
                        'emp_id' => $employee->id,
                        'project_id' => $project->id,
                        'module_id' => $module->id,
                        'date' => now()->subDays(rand(0, 10)),
                        'hours' => rand(1, 8),
                    ]);
                }
            }
        }
    }
}
