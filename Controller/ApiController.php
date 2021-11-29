<?php

require_once "./Model/TourModel.php";
require_once "./View/ApiView.php";


class ApiController{

    private $model;
    private $view;
  

    function __construct(){
        $this-> model = new TourModel();
        $this-> view = new ApiView();
        
    }

    function obtenerComentarios(){
        $comentarios = $this->model->getComentarios();
        return $this->view->response ($comentarios, 200);
    }

    function insertarComentario(){
        $body = $this->getBody();

        if(!empty($body->email)&&!empty($body->id_usuario)&&!empty($body->opinion)&&!empty($body->id_atraccion)&&!empty($body->puntaje)){
            $email= $body->email;
            $opinion= $body->opinion;
            $id_atraccion= $body->id_atraccion;
            $puntaje = $body->puntaje;
            $usuario = $body->id_usuario;
            
            $comentarioNuevo= $this->model-> agregarComentario($email, $opinion, $puntaje, $usuario, $id_atraccion);

            if ($comentarioNuevo){
                $this->view-> response("El comentario $comentarioNuevo se agregó con éxito",200);
            } else {
                $this->view-> response("Lo siento, el comentario no se pudo agregar",500);
            }
        }
        else{
            $this->view-> response("Lo siento, el comentario no se pudo agregar",500);
        }
    }

    function eliminarComentario ($params = null){
        $idComentario = $params [":ID"];
        $comentario = $this->model->getComentario($idComentario);
        if ($comentario){
            $this->model-> borrarComentario ($idComentario);
            return $this-> view-> response("El comentario con el id = $idComentario fue eliminado",200);
        } else {
            return $this-> view-> response("El comentario con el id= $idComentario no existe", 404);
        }
    }

   //devuelve el body del request
   private function getBody (){
        $bodyString = file_get_contents("php://input"); 
        return json_decode($bodyString);
    }
}