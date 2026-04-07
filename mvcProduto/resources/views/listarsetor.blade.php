<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Setores</title>
</head>
<body>
    <h1>Lista de Setores</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('setor.cadastro') }}">Novo Setor</a>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Corredor</th>
        <th>Ações</th>
    </tr>

    @foreach($setores as $setor)
    <tr>
        <td>{{ $setor->nome }}</td>
        <td>{{ $setor->numCorredor }}</td>
        <td>
            <a href="{{ route('setor.editar', $setor->id) }}">Editar</a>

            <form action="{{ route('setor.deletar', $setor->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>