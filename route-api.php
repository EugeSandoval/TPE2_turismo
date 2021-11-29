<?php
require_once 'Router.php';
require_once "Controller/ApiController.php";


// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentario', 'GET', 'ApiController', 'obtenerComentarios');
$router->addRoute('comentario/:id_atraccion', 'POST', 'ApiController', 'insertarComentario');
$router->addRoute('comentario/:ID', 'DELETE', 'ApiController', 'eliminarComentario');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
