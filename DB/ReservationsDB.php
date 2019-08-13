<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 8:41 PM
 */

require_once("DB.php");

class ReservationsDB extends DB
{
    public function insertReservation($reservation){
        $stm = $this->conn->prepare($sql = "INSERT INTO `reservations` (
        `first_name`, `last_name`, `email`, `phone`, `from_date`, `to_date`, `pay_day`, `hut_id`)
         VALUES ('".$reservation->first_name."',
                  '".$reservation->last_name."', 
                  '".$reservation->email."',
                  '".$reservation->phone."',
                  '".$reservation->from."', 
                  '".$reservation->to."',
                  '".$reservation->pay_day."',
                  '".$reservation->hut."');");
        $stm->execute();
    }

    public function gerHutReservations($hutId){
        $stm = $this->conn->prepare($sql = "SELECT `from_date`, `to_date` FROM `reservations` WHERE hut_id = ".$hutId.";");
        $stm->execute();
        $result = $stm->fetchAll();
        return $result;
    }

}
