

<?php
require_once('../config/database.php');


class producto
{
    private $base;

    public function __construct() {
        $this->base = new Database();
        
    }

    public function getProductos()
    {
        try {
            $query = "SELECT * FROM productos";
            $productos = $this->base->mostrarProductos($query);

            
           
                foreach($productos  AS $producto)
                {
                    echo 'NOMBRE:'.$producto['nombre'].' DESCRIPCION:'.$producto['descripcion'].' PRECIO:$'.$producto['precio'].'<br>';
                }
            
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

}

?>