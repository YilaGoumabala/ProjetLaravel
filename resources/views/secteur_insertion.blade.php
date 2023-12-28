<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>insertion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container text-cneter">
        <div class="row">
            <div class="col">
                <h1>inserer un secteur</h1>

                <hr>

                @if (session('status'))
                    <div class="alert  altert-succes">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="/traitement_secteur" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">

                    </div>
                    <div class="form-group">
                        <label for="superficie">Superficie</label>
                        <input type="number" class="form-control" id="superficie" name="superficie">

                    </div>
                    <div class="form-group">
                        {{ Form::label('vigiles_id', 'Vigile :') }}
                        {!! Form::select('vigiles_id', $vigile, null, ['class' => 'form-control']) !!}

                    </div>

                    <button type="submit" class="btn btn-primary">Inserer</button>
                    <br>
                    <br>
                    <a href="/secteur" class="btn btn-danger"> Revenir à la liste</a>
                </form>


            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
