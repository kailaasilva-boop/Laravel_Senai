<!DOCTYPE html>
<html lang="{{ str_replace('_','_', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Atualizar Aluno</h1>

    @if(@session('sucess'))
         <p style="color: greenyellow">{{session(sucess)}}</p>
    @endif

    <form action="{{route('aluno.update',$aluno->id)}}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{old('nome', $aluno->nome)}}" required>
        <input type="email" name="email" value="{{old('email', $aluno->email)}}" required>
        <button type="submit">Atualizar</button>
    </form>

    @if($erros->any())
       <div style="color: rebeccapurple">
            <ul>
                @foreach ($errors->() as $erro)
                    <li>{{erro}}</li>
                @endforeach
        

</body>
</html>