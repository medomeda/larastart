<table class="table table-striped table-sm">
        <thead>
            <tr>
                <td>ID</td>
                <td>Société</td>
                <td>Ratio</td>
                <td>Periode</td>
                <td>Valeur</td>
                <td style="width: 15%;" class="text-center">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($etudes as $etude)
            <tr>
                <td>{{ $etude->id }}</td>
                <td>{{ $etude->societe->name }}</td>
                <td>{{ $etude->ratio->name }}</td>
                <td>{{ $etude->periode }}</td>
                <td>{{ $etude->valeur }}</td>
                <td class="text-center">
                    <a href="{{ route('etudes.edit', $etude->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('etudes.destroy', $etude->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    