<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="sign">
        <h1>Registrar usuario</h1>
    </section>

    <section>
        <form action="{{route('user.save_User')}}" method="post">
            @csrf
            <label for="name">Nombre: </label>
            <input type="text" placeholder="nombre" name="name"><br>
            <label for="email">Email: </label>
            <input type="email" required name="email" placeholder="Correo Electronico"><br>
            <label for="contra">Contraseña: </label>
            <input type="password" name="contra" placeholder="contraseña" required><br>
            <input type="submit" value="Crear usuario">
        </form>
    </section>
</body>
</html>
