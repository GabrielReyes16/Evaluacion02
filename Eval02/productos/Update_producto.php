<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Recibimos los datos del formulario de edición
$idProducto = $_POST['idProducto'];
$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Stock = $_POST['Stock'];
$PrecioVenta = $_POST['PrecioVenta'];

// Consulta SQL para actualizar los valores
$sql = "UPDATE producto SET Nombre='$Nombre', Descripcion='$Descripcion', Stock='$Stock', PrecioVenta='$PrecioVenta' WHERE idProducto=$idProducto";

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
    <title>Editar Produucto</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
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
                echo 'La información del producto no fue actualizada';
            }
            else {
                echo 'La información del producto se actualizó';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>