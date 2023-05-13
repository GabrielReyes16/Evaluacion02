<?php
include('../conexion.php');
// Abrimos la conexión a la base de datos
$conexion = conectar();
// Variables para el buscador
$search = '';

// Verificar si se ha enviado una búsqueda
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
// Consulta SQL
$sql = "SELECT * FROM producto";
// Agregamos la condición de búsqueda si se ingresó texto en el buscador
if (!empty($search)) {
    $sql .= " WHERE Nombre LIKE '%$search%'";
}
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
    <style>
    body {
            background-color: ghostwhite ;
            display: flex;
            justify-content: center;
            align-items: center;

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
        a {
        background: none;
        border: 2px solid;
        font: inherit;
        line-height: 1;
        margin: 0.5em;
        padding:0.5em 1em;
        }

        a {
            color: var(--color);
            -webkit-transition: 0.25s;
            transition: 0.25s;
        }
       a:hover, a:focus {
        border-color: var(--hover);

        box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
        -webkit-transform: translateY(-0.25em);
        transform: translateY(-0.25em);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>

    <div class="container" id="container_productos">
        <form method="GET" action="Read_producto.php">   
            <div class="container">
            
            <h1>Productos</h1>
            <div class="d-grid col-4 mx-auto">
            <button class="raise" type="button" onclick="openFile('Create.html')">Crear nuevo producto</button>
        </div>
            <br>
                <label for="search">Buscar por nombre:</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="Ingrese el nombre del producto" value="<?php echo $search; ?>">
                <br>
                <button  type="submit" id="aceptar">Buscar</button>
            <button type="submit" onclick="limpiarInput()" id="cancelar">Limpiar</button>
            </div>
           
        </form>
        <br>
        <table class="table table-hover">
            <tr>
                <td class="table-dark">Id</td>
                <td class="table-dark">Nombre</td>
                <td class="table-dark">Descripción</td>
                <td class="table-dark">Stock</td>
                <td class="table-dark">Precio de venta</td>
                <td class="table-dark">&nbsp;</td>
            </tr>
            <tbody>
                <?php
                // Recorremos el array con los datos de los productos
                while ($productos = mysqli_fetch_array($resultado)) {
                    $idProducto = $productos['idProducto'];
                    $Nombre = $productos['Nombre'];
                    $Descripcion = $productos['Descripcion'];
                    $Stock = $productos['Stock'];
                    $PrecioVenta = $productos['PrecioVenta'];
                    echo '<tr>';
                    echo '<td>' . $idProducto . '</td>';
                    echo '<td>' . $Nombre . '</td>';
                    echo '<td>' . $Descripcion . '</td>';
                    echo '<td>' . $Stock . '</td>';
                    echo '<td>' . $PrecioVenta . '</td>';
                    echo '<td><a type="button" href="Update.php?id='.$idProducto.'") ) id="aceptar">Editar</a> | <a type="button" href="Delete.php?id=' .$idProducto.'" id="cancelar">Eliminar</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <script>
        function limpiarInput() {
            document.getElementById("search").value = '';
        }
        function openFile(filePath) {
             window.location.href = filePath;
        }
          </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <div class="d-grid col-4 mx-auto">
        <button id="cancelar" type="button" onclick="openFile('../index.html')">Volver al index</button>
        </div>
    </div>
</body>
</html>
