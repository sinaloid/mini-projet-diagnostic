<table id="example" class="table table-sm table-striped table-bordered " style="min-width:992px">
    <thead>
        <tr>
            <th class="text-center">id</th>
            <th class="text-center">Nom prenom</th>
            <th class="text-center">Addresse email</th>
            <th class="text-center">Creation</th>
            <th width='25%' class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>


        <tr class="text-center" style='background:#d9edf7'>

            <td>1</td>
            <td>Ounoid</td>
            <td>exemple@gmail.com</td>

            <td><span class="badge badge-lg badge-secondary text-white">12/12/2020</span></td>

            <td>
                <a class="btn btn-success btn-sm" href="#">Voir</a>
                <a class="btn btn-info btn-sm " href="#">Editer</a>
                <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger btn-sm "
                    href="#">Supprimer</a>
            </td>
        </tr>
        <!--tr class="text-center">
            <td>No user availabe now !</td>
        </tr-->

    </tbody>

</table>