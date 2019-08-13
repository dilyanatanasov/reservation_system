<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 10:47 PM
 */

require_once 'DB.php';

class HutsDB extends DB
{

    public function insertHut($hut){

        $stm = $this->conn->prepare($sql = "INSERT INTO `huts` (`name`, `address`, `rooms`, `extras`, `price`) 
                VALUES ('".$hut->name."',
                          '".$hut->address."',
                          '".$hut->rooms."',
                          '".$hut->extras."',
                          '".$hut->price."');");

        if($stm->execute()){
            return true;
        };
    }

    public function getHutNames(){

        $stm = $this->conn->prepare($sql = "SELECT `id_hut`, `name` FROM `huts`;");
        $stm->execute();
        $result = $stm->fetchAll();

        return $result;
    }

    public function getHutSize($hutId){

        $stm = $this->conn->prepare($sql = "SELECT `rooms` FROM `huts` WHERE `id_hut` = ".$hutId." LIMIT 1;");
        $stm->execute();
        $result = $stm->fetch();

        return $result;
    }

}