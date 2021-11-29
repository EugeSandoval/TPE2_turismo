<?php

require_once "./Model/TourModel.php";
require_once "./Model/LugarModel.php";
require_once "./View/LugarView.php";
require_once "./Helpers/AuthHelper.php";

class LugarController{

    private $model;
    private $view;
    private $tourModel;
    private $authHelper;

    function __construct(){
        $this-> model = new LugarModel();
        $this-> view= new LugarView ();
        $this-> tourModel = new TourModel();
        $this-> authHelper = new AuthHelper();
    }
    
    function showInicio (){
        $this->authHelper->chequearIngreso();
        $provincias = $this-> model-> getProvincias();
        $atracciones = $this->tourModel->getAtracciones();
        $this-> view->showProvincias($provincias, $atracciones);
    }

    function agregarProvincia (){
        $this-> model-> crearProvincia ($_POST['nombre_prov'], $_POST['region'], $_POST['cant_poblacion']);
        $this-> view-> mostrarDatos();
    }
    function eliminarProvincia($id){
        $this-> model->eliminarDato($id);
        $this-> view-> mostrarDatos();
    }
    function editarProvincia($id){
        $nombre =$_POST['nombre_prov'];
        $region =$_POST['region'];
        $cant_poblacion =$_POST['cant_poblacion'];
        if (isset($id)&&(!empty($nombre)&&!empty($region))){
            $this-> model-> cambiarDato($id,$nombre,$region,$cant_poblacion);
            $provincia = $this ->model ->getProvincias();
            $atraccion = $this ->tourModel ->getAtracciones();
            $this-> view-> showProvincias($provincia,$atraccion);
        }
        else {
            echo "el dato esta vacio";
        }
    }
    function verProvincia($id_vista){
        $prov = $this-> model->getProvincia($id_vista);
        $this-> view-> mostrarProvincia($prov);
    }


}