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
            {!!Form::text('nome', isset($contato)?$contato->nome:null, ['placeholder'=>'Informe os nome:', ($form)??null]) !!}

            <br>

            {!!Form::label('logradouro', 'Logradouro: ')!!}
            {!!Form::text('logradouro', isset($contato)?$contato->endereco->logradouro:null , ['placeholder'=>'Informe o logradouro: ',($form)??null]) !!}

            <br>

            {!!Form::label('numero', 'Numero: ')!!}
            {!!Form::text('numero', isset($contato)?$contato->endereco->numero:null , ['placeholder'=>'Informe o numero: ', ($form)??null]) !!}

            <br>

            {!!Form::label('cidade', 'Cidade: ')!!}
            {!!Form::text('cidade', isset($contato)?$contato->endereco->cidade:null , ['placeholder'=>'Informe a Cidade: ', ($form)??null]) !!}

            <br>

            {!!Form::label('telefone', 'Número de telefone 01: ')!!}
            {!!Form::text('telefone', isset($contato) && $contato->telefone->get(0) != null?$contato->telefone->get(0)->numero:null, ['placeholder'=>'Informe o telefone 01:  ', ($form)??null]) !!}


            {!!Form::label('tipo', 'Tipo: ')!!}


            {!! Form::select('tipo', $tipoTelefones, isset($contato) && (($contato->telefone->get(0)) != null)? $contato->telefone->get(0)->tipoTelefone->id:null,
             ['placeholder'=>'Informe o Tipo: ', ($form)??null] ) !!}

            <br>

            {!!Form::label('telefone02', 'Número de telefone 02: ')!!}
            {!!Form::text('telefone02', isset($contato) &&  $contato->telefone->get(1) != null?$contato->telefone->get(1)->numero:null, ['placeholder'=>'Informe o telefone 02: ', ($form)??null]) !!}


            {!!Form::label('tipo02', 'Tipo: ')!!}
            {!! Form::select('tipo02', $tipoTelefones, isset($contato) && (($contato->telefone->get(1)) != null) ? $contato->telefone->get(1)->tipoTelefone->id:null,
            ['placeholder'=>'Informe o Tipo: ',  ($form)??null]  ) !!}

            <br>
            {!!Form::label('categorias', 'Categorias: ')!!}
            @foreach ($categorias as $categoria)
                {!!Form::checkbox('categoria[]', $loop->iteration, isset($contato) && ($contato->categoria->find($loop->iteration) !== null) ,[ ($form)??null])!!}
                {!!Form::label('categoria[]', $categoria)!!}

            @endforeach

            <br>

            {!! Form::submit('Salvar')!!}

        {!! Form::close() !!}
    </div>

</body>
</html>
