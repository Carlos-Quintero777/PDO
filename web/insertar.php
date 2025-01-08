<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace a Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>NUEVO REGISTRO</title>
</head>
<body>
    <section class="section">
        <div class="container">
            <div class="box has-shadow">
                <h1 class="title has-text-centered">REGISTRAR PERSONA</h1>
                <form action="../acciones/registra.php" method="post">
                    <div class="field">
                        <label class="label" for="nombre">Nombre</label>
                        <div class="control">
                            <input class="input" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="edad">Edad</label>
                        <div class="control">
                            <input class="input" type="number" id="edad" name="edad" placeholder="Ingrese su edad" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="correo">Correo</label>
                        <div class="control">
                            <input class="input" type="email" id="correo" name="correo" placeholder="Ingrese su correo" required>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button type="submit" class="button is-primary">Insertar</button>
                        </div>
                        <div class="control">
                            <button type="reset" class="button is-danger">Limpiar</button>
                        </div>
                        <div class="control">
                            <a href="indice.php" class="button is-link is-light">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
