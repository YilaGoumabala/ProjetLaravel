<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vigile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container text-cneter">
        <div class="row">
            <div class="col">
                <h1>Liste des vigiles</h1>
                <hr>
                <a href="/insertion_vigile" class="butn butn-primary"> inserer un vigile </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>date Naissance</th>
                            <th>sexe</th>
                            <th>taille</th>
                            <th>poid</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vigile as $vigile)
                            <tr>
                                <td>{{ $vigile->id }}</td>
                                <td>{{ $vigile->nom }}</td>
                                <td>{{ $vigile->prenom }}</td>
                                <td>{{ $vigile->dateNaissance }}</td>
                                <td>{{ $vigile->sexe }}</td>
                                <td>{{ $vigile->taille }}</td>
                                <td>{{ $vigile->poids }}</td>

                                <td>
                                    <a href="{{ route('editer_vigile', $vigile->id) }} " class="btn btn-info">
                                        modifier</a>
                                    <a href="{{ route('supprimer_vigile', $vigile->id) }}" class="btn btn-danger"
                                        onclick="return confirm('voulez-vous supprimer');">Supprimer</a>
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
