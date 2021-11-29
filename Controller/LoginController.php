<?php
require_once "./Model/UserModel.php";
require_once "./View/LoginView.php";
require_once "./Model/TourModel.php";

class LoginController{
    private $model;
    private $view;
    private $tourModel;
    private $tourView;
   

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->tourModel = new TourModel();
        $this->tourView = new TourView();
       
    }

    function logout(){
        session_start();
        session_destroy();
        $this-> view-> showLogin("Te deslogueaste");
    }
    
    function login(){
        $this-> view-> showLogin();
    }

   function verificacion(){
    
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email= $_POST['email'];
            $password= $_POST['password'];
            
            //obtengo el usuario de la base de datos
            $usuario= $this->model->getUsuario($email);
            
            //si el usuario existe y las contraseñas coinciden
            if ($usuario && password_verify($password,$usuario->password)){
                
                session_start();
                $_SESSION["email"]=$email;
                $atracciones=$this->tourModel->getAtracciones();
                if(!($usuario->administrador)){
                    //tpl nuevo de usuario logueado con acceso a coments
                    
                    $this->view->showUsuario($atracciones,$usuario->id_usuario,$email);
                    $this->tourView->showComentario(false);
                }
                else{
                    $this->view->showInicio();
                    $this->tourView->showForm($atracciones,$usuario->id_usuario,$email);
                    
                }   
            } else{
                $this->view->showLogin("Acceso Denegado");
            }
        }   
    }

    function registro(){
        $email=$_POST['email'];
        $password=$_POST['password'];
        if(!empty($email)&& !empty($password)){
            $usuario=$this->model->getUsuario($email);
            if($usuario){
                $this->view->mostrarMensaje("El usuario $email ya está registrado. Por favor elija un nuevo usuario o inicie sesión.");
                $this-> view->showLogin();
            }
            else{
                $password= password_hash($password,PASSWORD_BCRYPT);
                $this->model->registroUsuario($email,$password);
                $atracciones=$this->tourModel->getAtracciones();
                $usuario= $this->model->getUsuario($email);//linea provisoria
                $this->view->showUsuario($atracciones, $usuario->id_usuario, $email);
            }   
        }
        else{
            $this->view->mostrarMensaje("Faltan datos para realizar la operación");
        }
        
    }

    function cargarRegistro(){
        $this->view->mostrarMensaje();
    }

    function administrarUsuarios(){
        $usuarios=$this->model->getUsuarios();
        $this->view->showUsuarios($usuarios);
    }

    function administrarPermisos($id_usuario){
        $usuarioById=$this->model->getUsuarioById($id_usuario);
        if(!($usuarioById->administrador)){
            $this->model->modificarAdministrador($id_usuario,true);
            $this->administrarUsuarios();
        }
        else{
            $this->model->modificarAdministrador($id_usuario,false);
            $this->administrarUsuarios();
        }
        
    }

    function eliminarUsuario($id_usuario){
        $this->model->borrarUsuario($id_usuario);
        $this->administrarUsuarios();
    }
}