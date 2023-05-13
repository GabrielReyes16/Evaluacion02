<?php
include('../conexion.php');
$conexion = conectar();

// Obtener el id del alumno a editar
$idProducto = $_GET['id'];

// Consulta SQL para obtener los datos del alumno
$sql = "SELECT  Nombre, Descripcion, Stock, PrecioVenta FROM producto WHERE idProducto = $idProducto ";
$resultado = mysqli_query($conexion, $sql);

// Obtener los datos del alumno
$producto = mysqli_fetch_array($resultado);

$Nombre = $producto['Nombre'];
$Descripcion = $producto['Descripcion'];
$Stock = $producto['Stock'];
$PrecioVenta = $producto['PrecioVenta'];


// Cerrar la conexión
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Eliminar Alumno</title>
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
        padding:0.5em 1em;
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
    #aceptar{
            color: #102192;
            --hover: #2952f4;
    }
    #aceptar:hover, #aceptar:focus{
                border-color: var(--hover);
                color: #2952f4;
    }
    #cancelar{
        color: #9a2020;
        --hover: #f33131;
    }
    #cancelar:hover, #cancelar:focus{
        border-color: var(--hover);
        color: #f33131;
            }
    </style>
</head>
<body>
    <div class="container">
    <h1>Eliminar Producto</h1>
    <form  name="formUpdate" action="Delete_producto.php" method="POST">
    <input type="hidden" name="idProducto" value="<?php echo $idProducto ?>">
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id=" Nombre" name="Nombre" value="<?php echo $Nombre ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="Descripcion"  value="<?php echo $Descripcion ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="Stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="Stock" value="<?php echo $Stock ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="PrecioVenta" class="form-label">Precio de Venta</label>
            <input type="number" step="0.01" class="form-control" name="PrecioVenta"  value="<?php echo $PrecioVenta ?>" readonly>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <button id="aceptar" type="submit">Eliminar</button>
            <button id="cancelar" type="button" onclick="openFile('Read_producto.php')">Regresar</button>
        </div>
        <script>
            function openFile(filePath) {
                 window.location.href = filePath;
            }
            </script>
</body>
</html>
