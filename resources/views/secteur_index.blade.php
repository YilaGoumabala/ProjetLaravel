<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>secteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container text-cneter">
        <div class="row">
            <div class="col">
                <h1>Liste des secteurs</h1>
                <hr>
                <a href="/insertion_secteur" class="butn butn-primary"> inserer un secteur </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nom</th>
                            <th>superficie</th>
                            <th>vigile_id</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($secteur as $secteur)
                            <tr>
                                <td>{{ $secteur->id }}</td>
                                <td>{{ $secteur->nom }}</td>
                                <td>{{ $secteur->superficie }}</td>
                                <td>{{ $secteur->vigiles_id }}</td>


                                <td>
                                    <a href='/editer/{{ $secteur->id }}' class="btn btn-info">
                                        modifier</a>
                                    <a href="{{ route('supprimer_secteur', $secteur->id) }}" class="btn btn-danger"
                                        onclick="return confirm('voulez-vous supprimer');">
                                        supprimer</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div>

</body>

</html>
