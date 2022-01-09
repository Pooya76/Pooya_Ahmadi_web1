<?php

namespace CRUD\Helper;
use \PDO;

class DBConnector
{	
	private $username = "root";
	private $password = "";
	private $table = "Person";
	


    /** @var mixed $db */
    private $db;

    public function __construct()
    {

		$this->connect();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
		$servername = "localhost";
		$db_name = "crudDb";

		try {
			  $this->db = new PDO("mysql:host=$servername;dbname=$db_name", $this->username, $this->password);
			  $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  	/* to create database once
				$qry = "CREATE DATABASE crudDb";
				this->execQuery($qry);*/
			  if (!table_exists($this->table, $db_name ,$this->db)) {
				
				$tab = "CREATE TABLE Person (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				firstname VARCHAR(30) NOT NULL,
				lastname VARCHAR(30) NOT NULL,
				username VARCHAR(50)
				)";
				$this->execQuery($tab);
				} 
		} catch(PDOException $e) {
			  exceptionHandler($e->getMessage());
		}
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query) : bool
    {
        return $this->db->exec($query);
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {
		echo $message;
    }
}