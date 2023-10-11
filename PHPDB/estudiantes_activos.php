<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include "./modulos/header.php";
        require "./clases/Estudiantes.php";

        $estudiante = new Estudiante();
        $arreglo_datos = $estudiante->getAll();
        $arreglo_estado = $estudiante->estadoByEgresadoDesercion();
        //print_r($arreglo_datos);
    ?>

    <main id="main">
        <section class="container">
            <h1>Gestion de Estudiantes Activos</h1>
            <a href="./registrar_estudiante.php" class="btn btn-primary mb-3">Registrar Estudiante</a>

            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Carnet</th>
                    <th>Bootcamp</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach($arreglo_datos as $item){ ?>
                        <tr>
                            <td><?php echo $item["nombre"]; ?></td>
                            <td><?php echo $item["direccion"]; ?></td>
                            <td><?php echo $item["carnet"]; ?></td>
                            <td><?php echo $item["bootcamp"]; ?></td>
                            <td>
                                <form action="./actualizar_estudiante.php" method="POST">
                                    <input type="hidden" name="id_estudiante" value="<?php echo $item["id"]; ?>">
                                    <input type="submit" class="btn btn-warning" value="Editar">
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalEstado<?php echo $item["id"]; ?>">Cambiar Estado</button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalEstado<?php echo $item["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cambio de Estado</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <h5><?php echo $item["nombre"]; ?></h5>
                                    <input type="hidden" name="id_estudiante" value="<?php echo $item["id"]; ?>">
                                    <p><strong>Estado: </strong>Activo</p>
                                        <label for="" class="form-label">Cambio de Estado</label>
                                        <select name="estado" id="" class="form-control">
                                            <?php foreach($arreglo_estado as $estado){ ?>
                                                <option value="<?php echo $estado['id']; ?>"><?php echo $estado['estado']; ?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-danger" value="Cambiar Estado">
                                </div>
                            </form>

                            <?php $estudiante->actualizarEstadoDesercionEgresado(); ?>
                            </div>
                        </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>