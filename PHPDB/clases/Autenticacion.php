<?php

require "./clases/Conexion.php";

class Autenticacion extends Conexion{
    protected $correo;
    protected $password;

    #metodo que valida el inicio de usuario de los coach
    public function autenticarUsuario(){
        if(isset($_POST['email'], $_POST['password'])){
            $this->correo = $_POST['email'];
            $this->password = $_POST['password'];
    
            $pdo = $this->conectar();
            $query = $pdo->prepare("SELECT id, nombre, correo, password FROM coach WHERE correo = ? AND password = ?");
            $query->execute([$this->correo, $this->password]);
    
            $usuario = $query->fetch(PDO::FETCH_ASSOC);
    
            if(is_array($usuario)){
                // Crear la sesión
                $_SESSION['usuario'] = $usuario['nombre'];
                header("Location: home.php");
                exit(); // Agregar exit() después de redirigir para detener la ejecución posterior.
            }else{
                echo "<div class='alert alert-danger' role='alert'>
                    Credenciales Incorrectas
                </div>";
            }
        }
    }
    
    }

?>