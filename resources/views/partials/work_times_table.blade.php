<h4>Working Times</h4>
<table class="table table-striped table-hover mb-0">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Working Hours</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($workTimes as $workTime)
            <tr>
                <td>{{ $workTime->id }}</td>
                <td>{{ $workTime->date }}</td>
                <td><span class='badge text-bg-primary'>{{ $workTime->hours }} </span></td>

            </tr>
        @endforeach
    </tbody>
</table>
