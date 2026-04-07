<!DOCTYPE html>
<html lang="{{str_replace('_','_', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Produto</title>
</head>
<body>
    <h1>Atualizar Produto</h1>

    @if(@session('sucess'))
        <p style="color: aquamarine">{{session(sucess)}}</p>
    @endif

    <form action="{{route('produto.update',$produto->id)}}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{old('nome', $produto->nome)}}"> required>
        <input type="number" name="quantidade" value="{{odl('quantidade', $produto->quantidade)}}"> required>
        <input type="number" name="preco" value="{{old('preco', $produto->preco)}}"> required>
        <button type="submit">Atualizar</button>
    </form>

    @if($erros->any())
       <div style="color: blueviolet">
           <ul>
            @foreach($errors->() as $erro)
                 <li>{{erro}}</li>
            @endforeach
</body>
</html>