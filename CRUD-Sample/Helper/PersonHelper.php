<?php

namespace CRUD\Helper;

class PersonHelper
{
	

    public function insert($user)
    {
		$db = new DBConnector();
		$fName = $user->getFirstName();
		$lName = getLastName();
		$usrname = getUsername();
		$qry = "INSERT INTO Person (firstname, lastname, username)VALUES ('$fName', '$lName', '$usrname')";
		$db->execQuery($qry); 	
    }

    public function fetch(int $id)
    {
		$db = new DBConnector();
		$qry = "SELECT * FROM Person WHERE id = '$id'";
		$db->execQuery($qry);
    }

    public function fetchAll()
    {
		$db = new DBConnector();
		$qry = "SELECT * FROM Person";
		$db->execQuery($qry);
    }

    public function update($fName,$lName,$usrname)
    {
		$db = new DBConnector();
		$qry = "UPDATE Person SET firstname ='$fName', lastname = '$lName' WHERE username = '$usrname'";
		$db->execQuery($qry);
    }

    public function delete($usrname)
    {
		$db = new DBConnector();
		$qry = "DELETE FROM Person WHERE username= '$usrname'";
		$db->execQuery($qry);
    }

}