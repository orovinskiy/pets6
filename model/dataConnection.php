<?php
require_once "connnection.php";

class DHB
{
    private $_db;

    function __construct()
    {
            //Create a new PDO connection
            $this->_db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

    }

    function getList()
    {

        $sql = "SELECT * FROM pet";

        $statement = $this->_db->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function addPet($name, $color, $type){
        $sql = "INSERT INTO pet VALUES (DEFAULT,:name,:color,:type)";

        $statement = $this->_db->prepare($sql);

        $statement->bindParam(':color', $color);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':type', $type);

        $statement->execute();
    }

}