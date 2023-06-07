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
    function show(){

    }
    function edit(){

    }
    function update(){

    }
    function destroy($id){
        // await
        $this->connection->beginTransaction();
        //query with prepare to avoid SQL inyection
        $stmt=$this->connection->prepare("DELETE FROM incomes WHERE id=:id");
        //execute the object stmt with the placeholder :id
        $stmt->execute([
            ":id"=>$id
        ]);
        //
        $sure=readline("Est'as seguro de eliminar el registro? ");
        if($sure == "no"){
            $this->connection->rollback();
        }else{
            $this->connection->commit();
        }

    }    
}

?>