<?php
require_once('./smarty-3.1.39/libs/Smarty.class.php');

class LugarView{
    private $smarty;
    function __construct (){
        $this-> smarty= new Smarty();
    }

    function showProvincias ($provincia,$atraccion){
        $this->smarty->assign('titulo',"Lista de Atracciones");
        $this->smarty->assign('listado',"Lista de Provincias");
        $this->smarty->assign('provincias', $provincia);
        $this->smarty->assign('atracciones', $atraccion);
        $this->smarty->display('templates/atracciones.tpl');
    }
    
    function mostrarDatos(){
        header ("Location:".BASE_URL."inicio");
    }

    function mostrarProvincia ($provincia){

        $this->smarty->assign('listado',"Lista de Provincias");
        $this->smarty->assign('provincias', $provincia);
        
        $this->smarty->display('templates/detalle_prov.tpl');
    }

    function LoginLocation(){
        header("Location: ".BASE_URL."login");
    }
}