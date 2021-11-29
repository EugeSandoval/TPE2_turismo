<?php

class TourModel{
    private $db;

    function __construct(){
        $this-> db= new PDO('mysql:host=localhost;'.'dbname=db_turismo;charset=utf8', 'root', '');
    }
 
    function getAtracciones(){
        $sentencia= $this-> db-> prepare('SELECT * FROM atraccion a INNER JOIN provincia p ON a.id_provincia=p.id_prov');
        $sentencia-> execute();
        $atracciones= $sentencia-> fetchAll(PDO:: FETCH_OBJ);
        return $atracciones;
    }

    function crearAtraccion ($nombre, $descripcion, $provincia){
        $sentencia= $this-> db->prepare("INSERT INTO atraccion(nombre, descripcion, id_provincia) VALUE (?,?,?)");
        $sentencia-> execute(array($nombre, $descripcion, $provincia));
    }

    function borrarDato ($id){
        $sentencia= $this-> db -> prepare("DELETE FROM atraccion WHERE id=?");
        $sentencia-> execute(array($id));
    }

    function modificarDato($id_edicion,$nombre,$descripcion,$provincia){
        $sentencia= $this-> db -> prepare("UPDATE atraccion a SET a.nombre=?, a.descripcion=?, a.id_provincia=? WHERE a.id=?");
        $sentencia-> execute(array($nombre, $descripcion, $provincia, $id_edicion));
        $atraccion= $sentencia->fetch(PDO::FETCH_OBJ);
        return $atraccion;  
    }

    function getAtraccion($id_vista){
        $sentencia= $this-> db -> prepare ("SELECT * FROM atraccion a INNER JOIN provincia p ON a.id_provincia=p.id_prov WHERE a.id=?");
        $sentencia ->execute (array($id_vista));
        $atraccion= $sentencia->fetch(PDO::FETCH_OBJ);
        return $atraccion;
    }
    
    function getAtraccionesPorProvincia($provincia){
        $sentencia= $this->db-> prepare('SELECT * FROM atraccion a INNER JOIN provincia p ON a.id_provincia = p.id_prov WHERE p.nombre_prov = ?'); 
        $sentencia->execute(array($provincia));
        $atracciones= $sentencia-> fetchAll(PDO:: FETCH_OBJ);
        return $atracciones;
    }

    function getComentarios(){
        $sentencia= $this-> db->prepare("SELECT * FROM comentario c INNER JOIN atraccion a ON c.id_atraccion = a.id INNER JOIN usuario u ON u.id_usuario = c.id_usuario");
        $sentencia-> execute();
        $comentarios= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    function agregarComentario($email, $opinion,$puntaje,$id_usuario, $id_atraccion){
        
        try{
            $sentencia= $this-> db->prepare("INSERT INTO comentario(email, opinion, puntaje, id_usuario, id_atraccion) VALUE (?,?,?,?,?)");
            $sentencia-> execute(array($email, $opinion,$puntaje,$id_usuario, $id_atraccion));
            return $this->db->lastInsertId();
        }
        catch(Exception $e){
            return $e;
        }
    }

    function getComentario($id){
        $sentencia= $this-> db -> prepare ("SELECT * FROM comentario WHERE id_comentario=?");
        $sentencia ->execute (array($id));
        $comentario= $sentencia->fetch(PDO::FETCH_OBJ);
        return $comentario;
    }

    function borrarComentario($id){
        $sentencia= $this-> db -> prepare("DELETE FROM comentario WHERE id_comentario=?");
        $sentencia-> execute(array($id));
    }
}
