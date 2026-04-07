<!DOCTYPE html>
<html lang="{{str_replace('_','_', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Usuarios</title>
</head>
<body>
    <h1>Cadastro Usuarios</h1>

    @if(session('sucess'))
        <p style="color: aquamarine">{{session('sucess')}}</p>
     @endif

     <form action="{{route('produto.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." require value="{{old('nome')}}">
        <br><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" placeholder="quantidade..." require value="{{old('quantidade')}}">
        <br><br>
        <label for="preco">PRECO:</label>
        <input type="number" name="preco" id="preco" placeholder="preco..." require value="{{old('preco')}}">
       
        <input type="submit" value="Cadastrar">
     </form>

        @if($errors->any())
    <div style="color: blueviolet">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>