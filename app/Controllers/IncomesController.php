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
        $connection->query("INSERT INTO incomes (payment_method,type,date,amount,description) VALUES(
            {$data['payment_method']},
            {$data['type']},
            '{$data['date']}',
            {$data['amount']},
            '{$data['description']}'
        );");
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