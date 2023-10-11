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
        $datos = $estudiante->getStudentById();
        //print_r($datos);
    ?>

    <main id="main">
        <section class="container">
            <h1>Actualizar Estudiante</h1>

            <form action="" method="POST">
                <?php foreach($datos as $objeto) { ?>
                    <input type="hidden" name="id_estudiante" value="<?php echo $objeto["id"]; ?>">

                    <label for="">Nombre Completo</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $objeto['nombre']; ?>">

                    <label for="">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $objeto['direccion']; ?>">

                    <label for="">Carnet</label>
                    <input type="text" class="form-control" name="carnet" value="<?php echo $objeto['carnet']; ?>">

                    <input type="submit" class="btn btn-dark my-4" value="Actualizar">
                <?php } ?>
            </form>

            <?php $estudiante->update(); ?>
        </section>
    </main>
</body>
</html>