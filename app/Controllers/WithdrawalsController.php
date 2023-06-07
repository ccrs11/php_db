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

        $stmt->bindParam(":payment_method",$data["payment_method"]);
        $stmt->bindParam(":type",$data["type"]);
        $stmt->bindParam(":date",$data["date"]);
        $stmt->bindParam(":amount",$data["amount"]);
        $stmt->bindParam(":description",$data["description"]);

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