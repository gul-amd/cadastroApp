<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CadastroApp</title>
</head>
<body>

    <a href="{{ route('user.index')}}">Home</a>

    <h2>Cadastrar Estudantes</h2>

    <form action="#" method="POST">
        @csrf
        @method('POST')

        <label>Name: </label>
        <input type="text" name

    </form>

</body>
</html>
