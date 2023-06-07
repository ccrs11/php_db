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

        $stmt->execute($data);
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