<?php

require_once('../controller/usuarioController.php');
require_once('../model/usuario.php');

if($_POST)
{
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass  = $_POST['pass'];

    $insert = new usuarioController();

    $insert ->registrarUsuario($nombre,$apellido,$correo,$pass);
}


?>