<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/5/2019
 * Time: 11:42 PM
 */

require_once 'DB.php';

class PricesDB extends DB
{

    public function getHutPrice($hutId){
        $stm = $this->conn->prepare($sql = "SELECT `price` FROM `huts` WHERE `id_hut` = ".$hutId->hutId." LIMIT 1;");
        $stm->execute();
        $result = $stm->fetch();
        return $result['price'];
    }

}