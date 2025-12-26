<h4>Employees</h4>
<table class="table table-striped table-hover mb-0">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Hour Cost</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->salary }}</td>
                <td>
                    @php
                        $totalHours = 0;
                        foreach ($employee->workTimes as $wt) {
                            $totalHours += $wt->hours;
                        }
                    @endphp
                    {{ number_format($employee->salary / $totalHours,2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
