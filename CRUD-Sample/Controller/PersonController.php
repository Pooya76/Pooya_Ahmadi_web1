<?php

namespace CRUD\Controller;

use CRUD\Model\Actions;
use CRUD\Model\Person;
use CRUD\Helper\PersonHelper;

class PersonController
{
    public function switcher($uri,$request)
    {
		
        switch ($uri)
        {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
		

    }

    public function createAction($request)
    {
		if(!is_numeric($request["firstName"]) || !is_numeric($request["lastName"])|| !is_numeric($request["username"])){
		$personHelper = new PersonHelper();
		$user = new Person();
		$user->setFirstName($request["firstName"]);
		$user->setLastName($request["lastName"]);
		$user->setUsername($request["username"]);
		$personHelper->insert($user);		
		}
    }

    public function updateAction($request)
    {
		if(!is_numeric($request["firstName"]) || !is_numeric($request["lastName"])|| !is_numeric($request["username"])){
		$personHelper = new PersonHelper();
		$personHelper->update($request["firstName"],$request["lastName"],$request["username"]);
		}
    }

    public function readAction($request)
    {
		if(is_numeric($request["id"]) && !empty($request["id"])){
		$personHelper = new PersonHelper();
		$personHelper->fetch($request["id"]);
		}
    }
    public function readAllAction($request)
    {
		$personHelper = new PersonHelper();
		$personHelper->fetchAll();
    }

    public function deleteAction($request)
    {
		if(!is_numeric($request["username"])){
		$personHelper = new PersonHelper();
		$personHelper->delete($request["username"]);
		}
    }

}