<!DOCTYPE html>
<html lang="{{str_replace('_','_', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadrasto Usuarios</title>
</head>
<body>
    <h1>Cadastro Usuarios</h1>

    @if(session('sucess'))
        <p style="color:greenyellow">{{session('sucess')}}</p>
    @endif

    <form action="{{route('aluno.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." require value="{{ old('nome')}}">
        <br><br>
         <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..." require value="{{ old('email')}}">

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
       <div style="color: rebeccapurple">
           <ul>
            @foreach ($errors->all() as $erro)
                   <li>{{$erro}}</li>
            @endforeach
           </ul>
       </div>
    @endif
</body>
</html>