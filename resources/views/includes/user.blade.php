<table id="example" class="table table-sm table-striped table-bordered " style="min-width:992px">
    <thead>
        <tr>
            <th class="text-center">id</th>
            <th class="text-center">Nom prenom</th>
            <th class="text-center">Addresse email</th>
            <th class="text-center">Creation</th>
            <th class="text-center">role</th>
            <th width='25%' class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($datas as $data)
            <tr class="text-center">
                <td>{{ ++$i }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td><span class="badge badge-lg badge-secondary text-white">{{ $data->created_at }}</span></td>
                @php
                    $role = $data->role()->first();
                    if (isset($role)) {
                        $role = $role->role;
                    }
                    $superUser = App\Models\Option::all()->first();
                    if (isset($superUser)) {
                        $superUser = $superUser->id;
                        if ($data->id == $superUser) {
                            $role = 'super admin';
                        }
                    }
                    
                @endphp
                <td>{{ isset($role) ? $role : 'user' }}</td>
                <td>
                    <a class="btn btn-success btn-sm " href="{{ route('user.edit', $data->id) }}">Voir</a>
                    <a class="btn btn-info btn-sm " href="{{ route('user.edit', $data->id) }}">Editer</a>

                    <form class="d-inline" action="{{ route('user.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm " type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')" 
                        >Supprimer</button>
                    </form>

                </td>
            </tr>
        @endforeach
        <!--tr class="text-center">
            <td>No user availabe now !</td>
        </tr-->

    </tbody>

</table>
