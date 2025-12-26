<h4>Modules</h4>
<table class="table table-striped table-hover mb-0">
    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th># Of Projects</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($modules as $module)
            <tr>
                <td>{{ $module->id }}</td>
                <td>{{ $module->name }}</td>
                <td><span class='badge text-bg-success'>{{ $module->projects->count() }} </span></td>
            </tr>
        @endforeach
    </tbody>
</table>
