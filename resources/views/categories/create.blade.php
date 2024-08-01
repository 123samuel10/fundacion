<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>FORMULARIO PARA CREAR Categorias</h1>

    <form action="/categories" method="POST">
        @csrf
        <label>
            Id:
            <input type="text" name="id">
        </label>

        <br>
        <br>

        <label>
            nombre:
            <input type="text" name="name">
        </label>



        <br>
        <br>
        <button type="submit">
            Crear categoria
        </button>

    </form>



</body>
</html>
