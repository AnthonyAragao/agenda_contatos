<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>
<body>
    <header>
        <h1>Formulário de Contato</h1>
    </header>

    <div>
        {!! Form::open(['route' => 'contatos.store','method' => 'POST', 'name' => 'form']) !!}
            {!!Form::label('nome', 'Nome: ')!!}
            {!!Form::text('nome', null, ['placeholder'=>'Informe os nome:']) !!}

            <br>

            {!!Form::label('logradouro', 'Logradouro: ')!!}
            {!!Form::text('logradouro', null, ['placeholder'=>'Informe o logradouro: ']) !!}

            <br>

            {!!Form::label('numero', 'Numero: ')!!}
            {!!Form::text('numero', null, ['placeholder'=>'Informe o numero: ']) !!}

            <br>

            {!!Form::label('cidade', 'Cidade: ')!!}
            {!!Form::text('cidade', null, ['placeholder'=>'Informe a Cidade: ']) !!}

            <br>

            {!!Form::label('telefone', 'Número de telefone 01: ')!!}
            {!!Form::text('telefone', null, ['placeholder'=>'Informe o telefone 01:  ']) !!}


            {!!Form::label('tipo', 'Tipo: ')!!}


            {!! Form::select('tipo', $tipoTelefones) !!}

            <br>

            {!!Form::label('telefone02', 'Número de telefone 02: ')!!}
            {!!Form::text('telefone02', null, ['placeholder'=>'Informe o telefone 02: ']) !!}


            {!!Form::label('tipo02', 'Tipo: ')!!}
            {!! Form::select('tipo02', $tipoTelefones) !!}

            <br>
            {!!Form::label('categorias', 'Categorias: ')!!}
            @foreach ($categorias as $categoria)
                {!!Form::checkbox('categoria', $loop->iteration)!!}
                {!!Form::label('categoria', $categoria)!!}

            @endforeach



            <br>

            {!! Form::submit('Salvar')!!}

        {!! Form::close() !!}
    </div>

</body>
</html>
