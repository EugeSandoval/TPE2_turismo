<?php

class LugarModel{
    private $db;

    function __construct(){
        $this-> db= new PDO('mysql:host=localhost;'.'dbname=db_turismo;charset=utf8', 'root', '');
    }
 
    function getProvincias(){
        $sentencia= $this-> db-> prepare('SELECT * FROM provincia');
        $sentencia-> execute();
        $provincias= $sentencia-> fetchAll(PDO:: FETCH_OBJ);
        return $provincias;
    }

    //funcion nueva
    function listaDeProvincias(){
        $sentencia= $this-> db-> prepare('SELECT nombre_prov FROM provincia');
        $sentencia-> execute();
        $provincias= $sentencia-> fetchAll(PDO:: FETCH_OBJ);
        return $provincias;
    }

    function crearProvincia ($nombre_prov, $region, $cant_poblacion){
        $sentencia= $this-> db->prepare("INSERT INTO provincia(nombre_prov, region, cant_poblacion) VALUE (?,?,?)");
        $sentencia-> execute(array($nombre_prov, $region, $cant_poblacion));
    }

    function eliminarDato ($id){
        $sentencia= $this-> db -> prepare("DELETE FROM provincia WHERE id_prov=?");
        $sentencia-> execute(array($id));
    }
    
    function cambiarDato($id_edicion,$nombre,$region,$poblacion){
        $sentencia= $this-> db -> prepare("UPDATE provincia SET nombre_prov=?,region=?,cant_poblacion=? WHERE id_prov=?");
        $sentencia-> execute(array($nombre,$region,$poblacion,$id_edicion));
        $provincia= $sentencia->fetch(PDO::FETCH_OBJ);
        return $provincia;
    }

    function getProvincia($id_vista){
        $sentencia= $this-> db -> prepare ("SELECT * FROM provincia WHERE id_prov=?");
        $sentencia ->execute (array($id_vista));
        $provincia= $sentencia->fetch(PDO::FETCH_OBJ);
        return $provincia;
    }
   

}
