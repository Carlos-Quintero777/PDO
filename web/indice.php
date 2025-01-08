<?php
require_once("../clases/Listar.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace a Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>TABLA DE REGISTROS</title>
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">TABLA DE REGISTROS</h1>
            <?php
            $listar = new Listar();       
            $datos = json_decode($listar->ListarTodos());
            ?>
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EDAD</th>
                        <th>CORREO</th>
                        <th>ACCIÓN</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $dato) {
                    ?>
                    <tr>
                        <td><?php echo $dato->id; ?></td>
                        <td><?php echo $dato->nombre; ?></td>
                        <td><?php echo $dato->edad; ?></td>
                        <td><?php echo $dato->correo; ?></td>
                        <td><a href="editar.php?id=<?php echo $dato->id; ?>" class="button is-primary is-small">EDITAR</a></td>
                        <td><a href="../acciones/elimina.php?id=<?php echo $dato->id; ?>" class="button is-danger is-small">ELIMINAR</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="has-text-centered mt-4">
                <a href="insertar.php" class="button is-success">CREA NUEVO REGISTRO</a>
            </div>
        </div>
    </section>  
</body>
</html>
