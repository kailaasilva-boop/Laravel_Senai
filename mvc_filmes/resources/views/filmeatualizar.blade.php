<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Filme</title>
</head>
<body>
    <h1>Atualizar Filme</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    <form action="{{ route('filme.update', $filme->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo..."
            require value="{{ old('titulo', $filme->titulo) }}"
        >
        <br><br>
        <label for="data_lancamento">Data de Lançamento: </label>
        <input type="date" name="data_lancamento" id="data_lancamento" placeholder="Data de Lançamento..."
            required value="{{ old('data_lancamento', $filme->data_lancamento)}}"
        >
        <br><br>
        <label for="sinopse">Sinopse: </label>
        <input type="text" name="sinopse" id="sinopse" placeholder="Sinopse..."
            required value="{{ old('sinopse', $filme->sinopse)}}"
        >
        <br><br>
        <label for="genero">Gênero: </label>
        <input type="text" name="genero" id="genero" placeholder="Gênero..."
            required value="{{ old('genero', $filme->genero)}}"
        >
        <br><br>
        <label for="orcamento">Orçamento: </label>
        <input type="number" name="orcamento" id="orcamento" placeholder="Orçamento..."
            required value="{{ old('orcamento', $filme->orcamento)}}"
        >

        <br><br>
        <label for="autor_id">Autores: </label>
        <select name="autor_id" id="autor_id">
            @foreach ($autores as $autor)
                <option value="{{ $autor->id }}"
                    {{ $filme->autor_id == $autor->id ? 'selected' : '' }}>
                    {{ $autor->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>