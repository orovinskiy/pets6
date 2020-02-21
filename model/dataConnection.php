<?php
require_once "connnection.php";

class DHB
{
    private $_db;

    function __construct()
    {
        try {
            //Create a new PDO connection
            $this->_db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "Connected";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getList()
    {

        $sql = "SELECT * FROM pet";

        $statement = $this->_db->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}