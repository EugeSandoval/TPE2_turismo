<?php

class UserModel{
    private $db;
    function __construct(){
        $this-> db=new PDO ('mysql:host=localhost;'.'dbname=db_turismo;charset=utf8','root','');
    }

    public function getUsuario($email){
        $sentencia= $this->db->prepare('SELECT * FROM usuario WHERE email=?');
        $sentencia->execute([$email]);
        $datos= $sentencia->fetch(PDO::FETCH_OBJ);
        return $datos;
    }

    function registroUsuario($email,$password){
        $sentencia= $this->db->prepare('INSERT INTO usuario(email, password) VALUE (?,?)');
        $sentencia->execute([$email,$password]);
        $datos= $sentencia->fetch(PDO::FETCH_OBJ);
        return $datos;
    }

    public function getUsuarios(){
        $sentencia= $this->db->prepare('SELECT * FROM usuario');
        $sentencia->execute();
        $datos= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $datos;
    }

    function modificarAdministrador($usuario,$valor){
        $sentencia= $this->db->prepare('UPDATE usuario SET administrador=? WHERE id_usuario=?');
        $sentencia->execute(array($valor,$usuario));
        $datos= $sentencia->fetch(PDO::FETCH_OBJ);
        return $datos;
    }

    public function getUsuarioById($id){
        $sentencia= $this->db->prepare('SELECT * FROM usuario WHERE id_usuario=?');
        $sentencia->execute([$id]);
        $datos= $sentencia->fetch(PDO::FETCH_OBJ);
        return $datos;
    }

    function borrarUsuario($id_usuario){
        $sentencia= $this->db->prepare('DELETE FROM usuario WHERE id_usuario=?');
        $sentencia->execute([$id_usuario]);
    }
}