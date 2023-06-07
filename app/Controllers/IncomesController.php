<?php 


namespace App\Controllers;

use Database\MySQLi\Connection;

Class IncomesController{
    
    function index(){

    }
    function create(){

    }
    function store($data){
        $connection=Connection::getInstance()->get_db_connection();
        $stmt=$connection->prepare("INSERT INTO incomes (payment_method,type,date,amount,description) VALUES(?,?,?,?,?);");
        $stmt->bind_param("iisds",$payment_method,$type,$date,$amount,$description);

        $payment_method=$data['payment_method'];
        $type=$data['type'];
        $date=$data['date'];
        $amount=$data['amount'];
        $description=$data['description'];
        
        $stmt->execute();

        echo "se han insertado {$stmt->affected_rows} filas en la base de datos";
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