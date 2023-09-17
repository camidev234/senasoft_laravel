<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
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
            @if (session()->has('user'))
                <form method="get" action="{{ route('user.logout') }}">
                    @csrf

                    <button type="submit">Logout</button>
                </form>
            @endif
        </section>
    </header>

    @if (session()->has('user'))
        <section class="departamentos">
            <h4>Gestión de departamentos</h4>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departamentos as $dpto)
                    <tr>
                        <td>{{ $dpto->nombre }}</td>
                        <td>{{ $dpto->fec_creacion }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay departamentos creados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    @else
    @guest

        <script>window.location.href = "{{ route('login_required') }}";</script>
    @endguest
    @endif
</body>
</html>
