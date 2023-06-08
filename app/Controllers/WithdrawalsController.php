<?php 


namespace App\Controllers;

use Database\PDO\Connection;

Class WithdrawalsController{

    private $connection;
    function __construct(){
        $this->connection=Connection::getInstance()->get_db_connection();
    }
    
    function index(){
        //make the query
        $stmt=$this->connection->prepare("SELECT * FROM withdrawals ");
        //execute the query
        $stmt->execute();
        // store the $stmt data in an array with fetchAll()
        $results=$stmt->fetchAll();
        // create something visible
        //var_dump($results);
        foreach($results as $result){
            echo "Gastaste " . $result["amount"] . " en: " . $result["description"] . "\n";
        }

        //* using fetch column
/*         $stmt=$this->connection->prepare("SELECT amount,description withdrawals ");
        $stmt->execute();
        $results=$stmt->fetchAll(\PDO::FETCH_COLUMN,0);
        var_dump($results); */

    }
    function create(){

    }
    function store($data){
        $stmt=$this->connection->prepare("INSERT INTO withdrawals(payment_method,type,date,amount,description) VALUES(:payment_method,:type,:date,:amount,:description)");
        //bindvalue avoid the parameter value change
        $stmt->bindValue(":payment_method",$data["payment_method"]);
        $stmt->bindValue(":type",$data["type"]);
        $stmt->bindValue(":date",$data["date"]);
        $stmt->bindValue(":amount",$data["amount"]);
        $stmt->bindValue(":description",$data["description"]);

        $data["description"]="Compr cosas para mi";

        $stmt->execute();
    }
    function show($id){
        $stmt=$this->connection->prepare("SELECT * FROM withdrawals WHERE id=:id;");
        $stmt->execute([
            ":id"=>$id
        ]);
        $result=$stmt->fetch(\PDO::FETCH_ASSOC);
        echo "dice que gastaste {$result['amount']}";
    }
    function edit(){

    }
    function update($data,$id){
        $stmt=$this->connection->prepare("UPDATE withdrawals SET
        payment_method= :payment_Method,
        type = :type,
        date = :date,
        amount = :amount,
        description = :description
        WHERE id = :id;
        ");
        $stmt -> execute(
            [
                ":id"=>$id,
                ":payment_method" => $data["payment_method"],
                ":type" => $data["type"],
                ":date" => $data["date"],
                ":amount" => $data["amount"],
                ":description" => $data["description"]
            ]
        );
    }
    function destroy($id){
        $stmt = $this->connection->prepare("DELETE * FROM withdrawals WHERE id=:id;");
        $stmt->execute([
            ":id"=>$id
        ]);
    }    
}

?>