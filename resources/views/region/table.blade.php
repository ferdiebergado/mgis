        <tr>
            <td scope="row">{{ $region->id }}</td>
            <td>{{ $region->name }}</td>
            <td>{{ $region->area }}</td>
            <td><a class="btn btn-primary btn-sm" href="{{ route('regions.edit', ['region' => $region->id])}}" role="button">Edit</a>
            <form id="frmDelete[{{ $region->id }}]" action="{{ route('regions.destroy', ['region' => $region->id]) }}" method="POST">
                @csrf
                @method("DELETE")
                <button id="btnDelete" class="btn btn-warning btn-sm" onclick="confirmDelete({{ $region->id }})">Delete</button>
            </form>
        </td>
        </tr>
