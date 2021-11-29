<?php
require_once('./smarty-3.1.39/libs/Smarty.class.php');

class ApiView{

    private $smarty;

    function __construct(){
        $this-> smarty = new Smarty();
    }

    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    
    }
    
         private function _requestStatus($code){
            $status = array(
                200 => "OK",
                400 => "Bad Request",
                404 => "Not found",
                500 => "Internal Server Error"
              );
              return (isset($status[$code]))? $status[$code] : $status[500];
    }    

}