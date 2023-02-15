<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>corraçãumm</h1>
    {{-- {{$contatos}} --}}

    <table>
        <tbody>
            <thead>
                <tr>
                    <th>Nomes</th>
                    <th>Telefones</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @foreach ($contatos as $contato)
                <tr>
                    <td>{{$contato->nome}}</td>

                    <td>
                    @if(($contato->telefone->count())>0)
                        {{$contato->telefone->first()->numero}}
                    @endif
                    </td>

                    <td>
                        <a href="">Visualizar</a>
                        <a href="">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
