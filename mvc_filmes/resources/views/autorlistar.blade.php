<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Autores</title>
</head>
<body>
    <h1>Relatório de Autores</h1>
    <a href="{{route('filme.cadastro')}}">Cadastrar Filme</a>
    <br>
    <a href="{{route('autor.cadastro')}}">Cadastrar Autor</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            @forelse($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ $autor->data_nascimento }}</td>
                    <td>{{ $autor->email }}</td>
                    <td>{{ $autor->telefone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum autor encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>