<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Filmes</title>
</head>
<body>
    <h1>Relatório de Filmes</h1>
    <a href="{{route('filme.cadastro')}}">Cadastrar Filme</a>
    <br>
    <a href="{{route('autor.cadastro')}}">Cadastrar Autor</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Data de Lançamento</th>
                <th>Sinopse</th>
                <th>Gênero</th>
                <th>Orçamento</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($filmes as $filme)
                <tr>
                    <td>{{ $filme->id }}</td>
                    <td>{{ $filme->titulo }}</td>
                    <td>{{ $filme->data_lancamento }}</td>
                    <td>{{ $filme->sinopse }}</td>
                    <td>{{ $filme->genero }}</td>
                    <td>{{ $filme->orcamento }}</td>
                    <td>
                        <a href="{{route('filme.atualizar', $filme->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('filme.deletar', $filme->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum filme encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>