<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <section class="welcome">
        @if (session()->has('user'))
        <?php $user = session('user'); ?>
        <p>Bienvenido, {{ $user->name }}</p>
        @endif
        </section>
        <section class="logout">

        </section>


    </header>

    <section class="departamentos">
        <h4>Gestion de departamentos</h4>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de creacion</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departamentos as $dpto)
                <tr>
                    <td>{{$dpto->nombre}}</td>
                    <td>{{$dpto->fec_creacion}}</td>
                </tr>
                @empty
                <tr>
                    <td>No hay departamentos creados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</body>
</html>
