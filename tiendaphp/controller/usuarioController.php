<?php
require_once('../config/database.php');
require_once('../view/login.html');
require_once('../model/usuario.php');

   if($_POST)
   {
    $usuario = new usuarioController();
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $usuario->verificarUsuario($correo,$pass);
   }

    
?>