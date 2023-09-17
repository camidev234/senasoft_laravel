<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login de usuario</h1>

    <form action="{{route('user.validate')}}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id=""><br>
        <label for="contra">Contraseña: </label>
        <input type="password" name="password"><br>
        <input type="submit" value="Iniciar sesion">
    </form>
</body>
</html>
