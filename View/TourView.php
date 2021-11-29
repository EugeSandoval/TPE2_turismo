<?php
require_once('./smarty-3.1.39/libs/Smarty.class.php');
class TourView{
    private $smarty;
    function __construct (){
        $this-> smarty= new Smarty();
    }

    function showVistaPublica($atracciones){
        $this->smarty->assign('titulo',"Destinos Disponibles");
        $this->smarty->assign('atracciones', $atracciones);
        $this->smarty->display('templates/vista_publica.tpl');
    }
   
    function showAtracciones ($atracciones,$provincias){
        $this->smarty->assign('titulo',"Lista de Atracciones");
        $this->smarty->assign('listado',"Lista de Provincias");
        $this->smarty->assign('atracciones', $atracciones);
        $this->smarty->assign('provincias', $provincias);
        $this->smarty->display('templates/atracciones.tpl');
    }

    function mostrarDatos(){
        header ("Location:".BASE_URL."inicio");
    }

    function mostrarAtraccion ($atraccion){
        $this->smarty->assign('atracciones', $atraccion);
        $this->smarty->display('templates/detalle_atraccion.tpl');
    }
    
    function mostrarFiltro($atracciones){
        $this->smarty->assign('titulo',"Resultado de la Búsqueda");
        $this->smarty->assign('atracciones', $atracciones);
        $this->smarty->display('templates/filtro.tpl');
   }

    function LoginLocation(){
        header("Location: ".BASE_URL."login");
    }

    function showComentario($isAdmin){
        $this->smarty->assign('isAdmin',$isAdmin);
        $this->smarty->display('templates/comentarios.tpl');
    }

    function showForm($id_atraccion, $id_usuario, $email){
        $this->smarty->assign('atracciones', $id_atraccion);
        $this->smarty->assign('id', $id_usuario);
        $this->smarty->assign('email', $email);
        $this->smarty->display('templates/form.tpl');
    }

}