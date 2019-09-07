<table class="table">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Area</th>
            <th colspan="2">Task(s)</th>
        </tr>
    </thead>
    <tbody>
        @each('region.table', $regions, 'region', 'empty')
    </tbody>
</table>
