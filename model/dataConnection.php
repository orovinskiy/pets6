<?php
class DHB{
    private $_db;

    function __construct()
    {
        try{
                //Create a new PDO connection
                $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                echo "Connected";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
    }
}