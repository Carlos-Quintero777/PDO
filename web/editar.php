<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title> 
    <!-- Enlace a Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <?php
    require_once("../clases/Listar.php");
    $id = $_GET["id"];
    if (isset($id)) {
        $miconexion = new Listar();
        $datos = json_decode($miconexion->ListarID($id));
        foreach($datos as $dato){
    ?>
    <!-- Usamos la clase 'section' para añadir margen y centrar el contenido -->
    <section class="section is-fullheight">
        <div class="container">
            <!-- Centramos el contenido con la clase 'has-text-centered' y 'box' -->
            <div class="box has-shadow">
                <h1 class="title is-4 has-text-centered">ACTUALIZAR DATOS</h1>
                <form action="../acciones/actualiza.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $dato->id; ?>">
                    <div class="field">
                        <label class="label" for="nombre">NOMBRE</label>
                        <div class="control">
                            <input class="input" type="text" id="nombre" name="nombre" value="<?php echo $dato->nombre; ?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="edad">EDAD</label>
                        <div class="control">
                            <input class="input" type="number" id="edad" name="edad" value="<?php echo $dato->edad; ?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="correo">CORREO</label>
                        <div class="control">
                            <input class="input" type="email" id="correo" name="correo" value="<?php echo $dato->correo; ?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="submit" class="button is-primary" value="Actualizar">

                            <a href="indice.php" class="button is-link is-light">Cancelar</a>
                        </div>                
                    </div>
                </form>
                
            </div>
        </div>
    </section>
    <?php
        }
    }
    ?>
</body>
</html>
