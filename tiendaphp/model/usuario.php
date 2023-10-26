<?php


class usuarioController
{
    private $base;

    public function __construct() {
        $this->base = new Database();
        
    }

    ///verificamos credenciales
    public function verificarUsuario($correo,$pass) {
        
        try {
            $query = "SELECT * FROM usuarios where email='$correo' and pass='$pass'";
            $usuarios = $this->base->login($query);

            
           
                if(!($usuarios) == null)
                {
                    
                    echo "Se ha autenticado correctamente";
                    header("Location:".'../view/principal.html');
                }
                else
                {
                    header("Location:".'../view/login.html');
                    echo "credenciales invalidas";
                }
            
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    public function registrarUsuario($nombre,$apellido,$email,$pass)
    {
       try
       {
        $query = "INSERT INTO usuarios(nombre,apellido,email,pass) values('$nombre','$apellido','$email','$pass')";
        $usuarios = $this->base->login($query);
        header("Location:".'../view/login.html');
       }
       catch(PDOException $e)
       {
        die("Error al insertar: " . $e->getMessage());
       }
    }
}

?>