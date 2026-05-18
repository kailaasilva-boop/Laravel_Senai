<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Autor</title>
</head>
<body>
    <h1>Cadastro Autor</h1>

    <br>
    <a href="{{route('filme.listar')}}">Listar Filme</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('autor.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="data_nascimento">Data  de Nascimento: </label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data  de Nascimento..."
            required value="{{ old('data_nascimento')}}"
        >
        <br><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder="Email..."
            required value="{{ old('email')}}"
        >
        <br><br>
        <label for="telefone">Telefone: </label>
        <input type="number" name="telefone" id="telefone" placeholder="Telefone..."
            required value="{{ old('telefone')}}"
        >

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>