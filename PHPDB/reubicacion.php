<?php include "./modulos/header.php";
        require "./clases/Estudiantes.php";

        $estudiante = new Estudiante();
        $arreglo_datos = $estudiante->getAll();
        $arreglo_estados = $estudiante->getAllState();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SISTEMA ACADEMIA KODIGO</title>
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
    <?php include "./modulos/header.php";  ?>
    <main id="main">
        <section class="container">
            <h1 class="text-center text-primary">Reubicaciones</h1>
            <div class="table-responsive pt-4">
                <table class="table table-dark">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Bootcamp</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                    <?php $count = 1; foreach($arreglo_datos as $item){ ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $item["nombre"]; ?></td>
                            <td><?php echo $item["direccion"]; ?></td>
                            <td><?php echo $item["bootcamp"]; ?></td>
                            <td><?php echo $item["estado"]; ?></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEstado<?php echo $item["id"]; ?>">Reubicar estudiante</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="ModalEstado<?php echo $item["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">Reubicar estudiante</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <h5><?php echo $item["nombre"]; ?></h5>
                                    <input type="hidden" name="id_estudiante" value="<?php echo $item["id"]; ?>">
                                    <p><strong>Bootcamp: </strong><?php echo $item['bootcamp']; ?></p>
                                        <label for="" class="form-label">Seleccione un estado</label>
                                        <select name="estado" id="" class="form-control">
                                            <?php foreach($arreglo_estados as $estado){ ?>
                                                <option value="<?php echo $estado['id_estado']; ?>"><?php echo $estado['estado']; ?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Reubicar Estudiante</button>
                                </div>
                            </form>

                            <?php $estudiante->updateReubicacion(); ?>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </section>
    </main>
    <?php include "./modulos/footer.php";  ?>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

