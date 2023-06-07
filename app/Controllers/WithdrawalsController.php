<?php 


namespace App\Controllers;

use Database\PDO\Connection;

Class WithdrawalsController{
    
    function index(){

    }
    function create(){

    }
    function store($data){
        $connection=Connection::getInstance()->get_db_connection();
        $stmt=$connection->prepare("INSERT INTO withdrawals(payment_method,type,date,amount,description) VALUES(:payment_method,:type,:date,:amount,:description)");
        //bindvalue avoid the parameter value change
        $stmt->bindValue(":payment_method",$data["payment_method"]);
        $stmt->bindValue(":type",$data["type"]);
        $stmt->bindValue(":date",$data["date"]);
        $stmt->bindValue(":amount",$data["amount"]);
        $stmt->bindValue(":description",$data["description"]);

        $data["description"]="Compr cosas para mi";

        $stmt->execute();
    }
    function show(){

    }
    function edit(){

    }
    function update(){

    }
    function destroy(){

    }    
}

?>