<?php

define('host','database-1.cqbzkt2cy0bh.us-east-2.rds.amazonaws.com');
    define('username','root');
    define('password','gvUpmjzLlqpYAoW2ERfs');
    define('database','tienda');

class database{

    private $pdo;


    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=".host.";dbname=".database,username,password
            );
            // Configuración adicional de PDO
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
    


    public function cerrar()
    {
        if($this->pdo != null)
        {
            $this->pdo = null;
            echo "Conexion cerrada con exito";
        }
        else
        {
            echo "No se encuentra inicializada una conexion a base de datos";
        }
    }

    public function login($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();

            // Obtener los resultados en un arreglo asociativo
            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    public function registrarUsuario($query)
    {
        try
        {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
        }
        catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    public function mostrarProductos($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();

            // Obtener los resultados en un arreglo asociativo
            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }
   

}
?>