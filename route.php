<?php

require_once "Controller/TourController.php";
require_once "Controller/LugarController.php";
require_once "Controller/LoginController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


if (!empty($_GET['action'])){
    $action= $_GET ['action'];
}else {
    $action= 'login'; //acción por defecto si no envía
}
$params = explode('/', $action);

$tourController = new TourController();
$lugarController= new LugarController();
$loginController= new LoginController();

switch ($params[0]) {
    case 'login': 
        $tourController->showInicioPublico();
        break;
    case 'iniciar': //iniciar sesión, sólo muestra el tpl. llama al verify
        $loginController->login();
        break;
    case 'verify': 
        $loginController->verificacion(); 
        break;
    case 'buscarPorProvincia': //filtro por provincia
        $tourController->buscarPorProvincia();
        break;
    case 'inicio': //sesión de admin
        $lugarController->showInicio(true);
        $loginController->administrarUsuarios();
        $tourController->verComentario();
        $tourController->verForm();
        break;
    case 'registrar': //sólo muestra el tpl para registrarse. llama al registro
        $loginController->cargarRegistro();
        break;
    case 'registro': 
        $loginController->registro();
        break; 

        //ABM de atracciones
    case 'agregarAtraccion': 
        $tourController->agregarAtraccion(); 
        break;
    case 'eliminarAtraccion': 
        $tourController->eliminarAtraccion($params[1]); 
        break;
    case 'editarAtraccion':
        $tourController->editarAtraccion($params[1]);
        break;
    case 'verAtraccion':
        $tourController->verAtraccion($params[1]);
        break;

        //ABM de provincias
    case 'agregarProvincia':
        $lugarController->agregarProvincia();
        break;
    case 'eliminarProvincia':
        $lugarController-> eliminarProvincia($params[1]);
        break;
    case 'editarProvincia':
        $lugarController->editarProvincia($params[1]);
        break;
    case 'verProvincia':
        $lugarController->verProvincia($params[1]);
        break;

        //ABM de usuarios
    case 'administrarPermisos':
        $loginController->administrarPermisos($params[1]);
        break;
    case 'eliminarUsuario':
        $loginController->eliminarUsuario($params[1]);
        break;
    
    default:
        echo ("404: Page not found");
        break;
}
