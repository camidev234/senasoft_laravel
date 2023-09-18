<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <style>
        .departamentos, .cargos {
            margin-top: 70px;
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
            align-items: center;
            overflow: auto;
            margin-bottom: 40px;
        }

        .table {
            width: 70%;
        }

        .tableTwo {
            width: 59%;
        }

        .td {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .actions {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .boton {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }



    </style>
    <title>Document</title>
</head>
<body>
@if(session()->has('user'))
<header class="header bg-primary text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="welcome">
                        <?php $user = session('user'); ?>
                        <p>Bienvenido, {{ $user->name }}</p>
                </section>
            </div>
            <div class="col-md-6 text-md-end">
                <section class="logout">
                        <form method="get" action="{{ route('user.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-light">Logout</button>
                        </form>
                </section>
            </div>
        </div>
    </div>
</header>

<section class="departamentos">
    <h4>Gestión de departamentos</h4>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de creación</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departamentos as $dpto)
            <tr>
                <td class="text-center align-middle">{{ $dpto->nombre }}</td>
                <td class="text-center align-middle">{{ $dpto->fec_creacion }}</td>
                <td class="actions">
                    <form action="{{route('dpto.eliminar_route', ['id' => $dpto->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar Dpto</button>
                    </form>
                    <form action="{{route('dpto.act_view', ['id' => $dpto->id])}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>No hay departamentos creados</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="boton"><a href="{{route('dpto_crear_view')}}" class="btn btn-primary">Crear Departamento</a></div>
</section>

<section class="cargos">
    <h4>Gestión de cargos</h4>
    <table class="table table-bordered tableTwo">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de creación</th>
                <th class="text-center">Departamento</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cargos as $c)
            <tr>
                <td class="text-center align-middle">{{ $c->nombre }}</td>
                <td class="text-center align-middle">{{ $c->fec_creacion }}</td>
                <td class="text-center align-middle">{{ $c->nombre_departamento }}</td>
                <td class="actions">
                    <form action="{{route('cargo.eliminar_route', ['id' => $c->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    <form action="{{route('cargo.act_view', ['id' => $c->id])}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No hay cargos creados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="boton"><a href="{{route('cargo_crear_view')}}" class="btn btn-primary">Crear cargo</a></div>
</section>
@else
    @guest

        <script>window.location.href = "{{ route('login_required') }}";</script>
    @endguest
@endif


</body>
</html>
