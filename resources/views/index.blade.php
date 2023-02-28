<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&display=swap" rel="stylesheet">
</head>
<body>
    <h1 class="text-center" style="padding-top:1rem;">Listagem de Contatos</h1>
    <a href="{{route('contatos.create')}}">
        <button type="button" class="btn btn-primary" style="margin-left: 2rem;">Novo contato</button>
    </a>

    <div style="width: 50%; margin-left: 2rem;">
        <table class="table mx-auto">
            <thead class="table-dark">
                <h3 class="text-center mt-3">Contatos</h3>
                <tr>
                    <th>Nome</th>
                    <th>Telefones</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                    <tr>
                        <td>{{$contato->nome}}</td>

                        <td>
                        @foreach ($contato->telefone as $telefone)
                                {{$telefone->numero}}
                                ({{$telefone->tipoTelefone->nome}});
                                <br>
                        @endforeach
                        </td>

                        <td>
                            <a href="{{route('contatos.show', $contato->id)}}">
                                <button type="button" class="btn btn-secondary">Visualizar</button>
                            </a>
                            <a href="{{route('contatos.edit', $contato->id)}}">
                                <button type="button" class="btn btn-warning">Editar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
