<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&display=swap" rel="stylesheet">
    <title>Treinamento DITIN</title>
</head>

<body class="treinamento">
    <div id="title-treinamento">
        <h1 style="background-color: rgba(0, 0, 0, 0.699); margin: 0; padding: 0; padding-left: 2rem; padding-top: 2px; padding-bottom: 8px; ">
            Projeto Treinamento DITIN
        </h1>
    </div>


    <div id="container-saudacao">
        <div id="saudacao">
            <p>Treinamento DITIN - CRUD de cadastramento de contatos usando laravel</p>

            <a href="{{ route('contatos.index') }}">
                <button type="button" class="btn btn-secondary">Clique para entrar</button>
            </a>
        </div>
   </div>
</body>

</html>
