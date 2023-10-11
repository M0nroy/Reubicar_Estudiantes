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
        $arreglo_bootcamps = $estudiante->getBootcamps();
        $arreglo_materias = $estudiante->getMaterias();
    ?>

    <main id="main">
        <section class="container">
            <h1>Registro Estudiantil</h1>

            <form action="" method="POST">
                <label for="">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre">

                <label for="">Direccion</label>
                <input type="text" class="form-control" name="direccion">

                <label for="">Carnet</label>
                <input type="text" class="form-control" name="carnet">

                <label for="">Seleccione Bootcamp</label>
                <select name="bootcamp" class="form-control">
                    <!-- base de datos -->
                    <?php foreach($arreglo_bootcamps as $bootcamp){ ?>
                        <option value="<?php echo $bootcamp['id']; ?>"><?php echo $bootcamp['bootcamp']; ?></option>
                    <?php } ?>
                </select>

                <label for="">Seleccione Materias</label>
                <!-- base de datos -->
                <?php foreach($arreglo_materias as $materia){ ?>
                    <input type="checkbox" name="materias[]" value="<?php echo $materia["id"]; ?>"> <?php echo $materia['nombre']; ?>
                <?php } ?>
                <br>
                <input type="submit" class="btn btn-primary my-4" value="Registrar">
            </form>

            <?php $estudiante->save(); ?>
        </section>
    </main>
</body>
</html>