<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Categoría</title>
</head>
<body>

    <h1>{{ isset($categoria) ? 'Editar' : 'Crear' }} Categoría</h1>

    <form action="{{ isset($categoria) ? route('categories.update', $categoria) : route('categories.store') }}" method="post">
        @csrf
        @if(isset($categoria))
            @method('PATCH')
        @endif

        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="{{ old('name', $categoria->name ?? '') }}" required>

        <br><br>

        <button type="submit">{{ isset($categoria) ? 'Actualizar' : 'Guardar' }}</button>
    </form>

    <a href="{{ route('categories.index') }}">Regresar</a>

</body>
</html>
