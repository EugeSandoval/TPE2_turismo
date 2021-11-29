<?php
require_once ('./smarty-3.1.39/libs/Smarty.class.php');

class LoginView{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }

    function showLogin($error=""){
        $this->smarty ->assign('error', $error);
        $this->smarty ->assign('titulo', 'Iniciar Sesión');
        $this->smarty ->display('templates/administradores.tpl');
    }

    function showInicio(){
        header ("Location:".BASE_URL."inicio");
    }  

    function mostrarUsuario(){
        $this->smarty ->assign('usuario', 'Usuario');
        $this->smarty ->display('templates/administradores.tpl');
    }

    function mostrarRegistro(){
        $this->smarty ->assign('titulo', 'Registro de Usuario');
        $this->smarty ->display('templates/usuario.tpl');
    }

    function mostrarMensaje($mensaje=""){
        $this->smarty ->assign('titulo', 'Registro de Usuario');
        $this->smarty ->assign('error', $mensaje);
        $this->smarty ->display('templates/usuario.tpl');
    }

    function showUsuario($atracciones,$id,$email){
        $this->smarty->assign('atracciones', $atracciones);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('email', $email);
        $this->smarty ->display('templates/usuario_logueado.tpl');
        $this->smarty->display('templates/form.tpl');
    }

    function showUsuarios($usuarios){
        $this->smarty->assign('titulo', 'Lista de Usuarios');
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty ->display('templates/lista_usuarios.tpl');
    }

}