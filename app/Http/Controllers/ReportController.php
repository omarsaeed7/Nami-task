<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Module;
use App\Models\WorkTime;

class ReportController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('reports', compact('projects'));
    }

    public function filter(Request $request)
    {
        $projectId = $request->project_id;

        if ($projectId == 'all') {
            $employees = Employee::with('workTimes.project', 'workTimes.module')->get();
            $modules = Module::with('workTimes.project', 'workTimes.employee')->get();
            $projects = Project::with('workTimes.employee', 'workTimes.module')->get();
            $workTimes = WorkTime::with('employee', 'project', 'module')->get();
        } else {
            $employees = Employee::whereHas('workTimes', fn($q) => $q->where('project_id', $projectId))
                ->with(['workTimes' => fn($q) => $q->where('project_id', $projectId)->with('project', 'module')])
                ->get();

            $modules = Module::whereHas('workTimes', fn($q) => $q->where('project_id', $projectId))
                ->with(['workTimes' => fn($q) => $q->where('project_id', $projectId)->with('employee', 'project')])
                ->get();

            $projects = Project::where('id', $projectId)
                ->with(['workTimes' => fn($q) => $q->with('employee', 'module')])
                ->get();

            $workTimes = WorkTime::with('employee', 'project', 'module')
                ->where('project_id', $projectId)
                ->get();
        }

        return response()->json([
            'employees' => view('partials.employees_table', compact('employees'))->render(),
            'modules' => view('partials.modules_table', compact('modules'))->render(),
            'projects' => view('partials.projects_table', compact('projects'))->render(),
            'workTimes' => view('partials.work_times_table', compact('workTimes'))->render(),
        ]);
    }
}

