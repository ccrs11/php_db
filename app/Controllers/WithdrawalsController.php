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
        $rowAfected=$connection->exec("INSERT INTO withdrawals(payment_method,type,date,amount,description) VALUES(
            {$data['payment_method']},
            {$data['type']},
            '{$data['date']}',
            {$data['amount']},
            '{$data['description']}'
        )");
        echo "se han insertado $rowAfected filas en la base de datos";
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