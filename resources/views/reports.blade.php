@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">
            <i class="fas fa-chart-line text-primary"></i>
            Reports
        </h1>
        <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </button>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm" style="margin-left:87em">Logout</button>
        </form>
        <div class="row g-3 align-items-center mb-4">
            <div class="col-sm-6 col-md-4">
                <label for="projectSelect" class="form-label">
                    <i class="fas fa-filter"></i> Choose Project to display
                </label>
                <select id="projectSelect" class="form-select" aria-label="Select project">
                    <option value="all" selected>All Projects</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-auto">
                <label class="form-label d-block mb-1">&nbsp;</label>
                <button id="applyFilter" class="btn btn-primary">
                    <i class="fas fa-check"></i> Apply
                </button>
            </div>

            <div class="col-12 col-md-4 align-self-end">
                <div id="filterInfo" class="alert alert-info py-2 mb-0">
                    <small>
                        <i class="fas fa-info-circle"></i>
                        <span id="filterText">Select a project and click Apply</span>
                    </small>
                </div>
            </div>
        </div>

        <div id="tablesContainer">
            @include('partials.employees_table', [
                'employees' => \App\Models\Employee::with('workTimes.project', 'workTimes.module')->get(),
            ])
            <br>
            <hr>
            @include('partials.projects_table', [
                'projects' => \App\Models\Project::with('workTimes.employee', 'workTimes.module')->get(),
            ])

            <br>
            <hr>
            @include('partials.modules_table', [
                'modules' => \App\Models\Module::with('workTimes.project', 'workTimes.employee')->get(),
            ])
            <br>
            <hr>
            @include('partials.work_times_table', [
                'workTimes' => \App\Models\WorkTime::with('employee', 'project', 'module')->get(),
            ])
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#applyFilter').click(function() {
            const projectId = $('#projectSelect').val();

            axios.get('{{ route('reports.filter') }}', {
                    params: {
                        project_id: projectId
                    }
                })
                .then(function(response) {
                    document.getElementById('tablesContainer').innerHTML =
                        response.data.employees +
                        response.data.projects +
                        response.data.modules +
                        response.data.workTimes;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>
@endsection
