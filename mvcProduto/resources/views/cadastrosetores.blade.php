<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Setor</title>
</head>
<body>
 <h1>Cadastrar Setor</h1>

@if($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('setor.salvar') }}">
    @csrf

    <input type="text" name="nome" placeholder="Nome"><br><br>
    <input type="text" name="numCorredor" placeholder="Corredor"><br><br>

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('setor.listar') }}">Voltar</a>
</body>
</html>
