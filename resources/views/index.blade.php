<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <h1 class="text-center">Listagem de Contatos</h1>
    <a href="{{route('contatos.create')}}">Novo contato</a>

    <div class="container">
        <table class="table mx-auto">
            <thead class="table-dark">
                <h3 class="text-center mt-5">Contatos</h3>
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
                            <br>{{$telefone->numero}}
                                ({{$telefone->tipoTelefone->nome}});
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
