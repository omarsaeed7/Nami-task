<h4>Projects</h4>
<table class="table table-striped table-hover mb-0">
    <thead class="table-dark">
        <tr>
            <th>Project ID</th>
            <th>Project Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Working Times</th>
            <th>Total Employees</th>
            <th>Total Span </th>
            <th>Total Project Cost</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->workTimes->sortByDesc('date')->min('date') }}
                <td>{{ $project->workTimes->sortByDesc('date')->max('date') }}

                <td><span class='badge text-bg-primary'>{{ $project->workTimes->count() }} Times</span></td>
                <td><span class='badge text-bg-secondary'>{{ $project->employees->count() }} Employees</span></td>
                @php
                    $firstDate = $project->workTimes->min('date');
                    $lastDate = $project->workTimes->max('date');
                    $totalSpan = \Carbon\Carbon::parse($firstDate)->diffInDays(\Carbon\Carbon::parse($lastDate));
                @endphp
                <td>{{ $totalSpan }} days</td>
                <td> <span class='badge text-bg-danger'>No Data </span></td>

            </tr>
        @endforeach
    </tbody>
</table>
