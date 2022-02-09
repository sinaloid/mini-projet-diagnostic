<table id="example" class="table table-sm table-striped table-bordered " style="min-width:992px">
    <thead>
        <tr>
            <th class="text-center">Id attitude</th>
            <th class="text-center">Fuite/Passivité</th>
            <th class="text-center">Attaque/Agressivité</th>
            <th class="text-center">Manipulation</th>
            <th class="text-center">Assertive</th>
            <th class="text-center">Creation</th>
            <th width='25%' class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($datas as $data)
            <tr class="text-center">
                <td>{{++$i}}</td>
                <td>{{$data->categorie_1}}</td>
                <td>{{$data->categorie_2}}</td>
                <td>{{$data->categorie_3}}</td>
                <td>{{$data->categorie_4}}</td>
                <td><span class="badge badge-lg badge-secondary text-white">{{$data->created_at}}</span></td>
                <td>
                    <a class="btn btn-success btn-sm disabled" href="{{ route('question.edit', $data->slug) }}">Voir</a>
                    <a class="btn btn-info btn-sm  disabled" href="{{ route('question.edit', $data->slug) }}">Editer</a>
                    <form class="d-inline disabled" action="{{ route('question.destroy', $data->slug) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm  disabled" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')" 
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
