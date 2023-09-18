<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
        <h2>Actualizar Cargo: </h2>
        <form action="{{route('cargo.act_route', ['id' => $cargo->id])}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" value="{{$cargo->nombre}}">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <select name="departamento" id="">
                    @forelse($departamentos as $dpto)
                    <option value="{{$dpto->id}}">{{$dpto->id}}-{{$dpto->nombre}}</option>
                    @empty
                    <option value="">No se encontraron departamentos</option>
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{$cargo->fec_creacion}}">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
