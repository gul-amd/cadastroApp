<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>
<body>

    <a href="{{ route('user.index')}}">Listar</a><br>
    <a href="{{ route('user.edit', ['user' => $user->id])}}">Editar</a><br>


    <h2>Vizualizar Estudante</h2>

    @if (session('sucess'))
    <p style="collor:#086">
        {{ session('sucess') }}
    </p>

    @endif

    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    Cadastrado: {{ \carbon\carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \carbon\carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}<br>


</body>
</html>
