<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <h1>Listagem de Contatos</h1>
    <a href="{{route('contatos.create')}}">Novo contato</a>

    <div>
        <table>
            <thead>
                <h3>Contatos</h3>
                <tr>
                    <th>Nomes</th>
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
                            <a href="{{route('contatos.show', $contato->id)}}">Visualizar</a>
                            <a href="{{route('contatos.edit', $contato->id)}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
