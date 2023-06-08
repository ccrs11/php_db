<?php 


namespace App\Controllers;

use Database\PDO\Connection;

Class IncomesController{

    private $connection;
    function __construct()
    {
        $this->connection=Connection::getInstance()->get_db_connection();
    }
    
    function index(){
        $stmt=$this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();

        $stmt->bindColumn("amount", $amount);
        $stmt->bindColumn("description", $description);

        while($stmt->fetch()){
            echo "Ganaste $amount USD en: $description \n";
        }

    }
    function create(){

    }
    function store($data){
        $stmt=$this->connection->prepare("INSERT INTO incomes (payment_method,type,date,amount,description) VALUES(:payment_method,:type,:date,:amount,:description);");
        $stmt->bindParam(":payment_method",$data["payment_method"]);
        $stmt->bindParam(":type",$data["type"]);
        $stmt->bindParam(":date",$data["date"]);
        $stmt->bindParam(":amount",$data["amount"]);
        $stmt->bindParam(":description",$data["description"]);
        
        $stmt->execute();

    }
    function show($id){
        $stmt=$this->connection->prepare("SELECT FROM incomes where id=:id");
        $stmt->execute([
            ":id"=>$id
        ]);
    }
    function edit(){

    }
    function update($data,$id){
        $stmt=$this->connection->prepare("UPDATE FROM incomes SET
            payment_method = :payment_method,
            type = :type,
            date = :date,
            amount = :amount,
            description = :description
            WHERE id = :id;"
        );
        $stmt->execute([
            ":id"=>$id,
            ":payment_method"=>$data["payment_method"],
            ":type"=>$data["type"],
            ":date"=>$data["date"],
            ":amount"=>$data["amount"],
            ":description"=>$data["description"]
            ]
        );
    }
    function destroy($id){
        //query with prepare to avoid SQL inyection
        $stmt=$this->connection->prepare("DELETE FROM incomes WHERE id=:id");
        //execute the object stmt with the placeholder :id
        $stmt->execute([
            ":id"=>$id
        ]);

    }    
}

?>