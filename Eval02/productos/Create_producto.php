<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$idProducto = $S_POST['idProducto'];
$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Stock = $_POST['Stock'];
$PrecioVenta = $_POST['PrecioVenta'];


// Formamos la consulta SQL
$sql = "INSERT INTO producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES ('$Nombre', '$Descripcion', '$Stock', '$PrecioVenta')";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Nuevo Producto</title>
    <style>
    body {
            background-color: ghostwhite ;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            border: 2px solid #000000;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
            max-width: 50%;
        }
        button {
        background: none;
        border: 2px solid;
        font: inherit;
        line-height: 1;
        margin: 0.5em;
        padding:1em 2em;
        }

        button {
            color: var(--color);
            -webkit-transition: 0.25s;
            transition: 0.25s;
        }
        button:hover, button:focus {
        border-color: var(--hover);

        box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
        -webkit-transform: translateY(-0.25em);
        transform: translateY(-0.25em);
    }
    .raise:hover,
    .raise:focus {
    box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    -webkit-transform: translateY(-0.25em);
    transform: translateY(-0.25em);
    }
    .raise {
    color: #029818;
    --hover: #5bec95;
    }

    </style>
</head>
<body>
    <div class="container">
    <h3>
        <?php

        if (!$resultado) {
            echo 'El producto no fue registrado';
        }
        else {
            echo 'El producto ha sido registrado';
        }
        ?>
    </h3>
    <button class="raise" type="button" onclick="openFile('Read_producto.php')">Regresar</button>
    </div>
    <script>
        function openFile(filePath) {
             window.location.href = filePath;
        }
          </script>
</body>
</html>