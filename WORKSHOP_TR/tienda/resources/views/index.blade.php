<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="bar">
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="{{route('user.sign_up')}}">Signup</a></li>
                <li><a href="{{route('user.login')}}">Login</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
