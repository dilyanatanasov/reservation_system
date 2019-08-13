<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/5/2019
 * Time: 6:47 PM
 */

require_once '../DB/ReservationsDB.php';
require_once '../DB/HutsDB.php';

class RoomChecker
{

    public function checkReservation($from, $to, $hut){

        $reservations = $this->getAllReservationsOfHut($hut);
        $hutRoomCount = $this->getHutSize($hut);
        $hutRoomCount = $hutRoomCount['rooms'];

        $fromObj = new DateTime($from);
        $toObj = new DateTime($to);

        $interval = DateInterval::createFromDateString('+1 day');
        $period = new DatePeriod($fromObj, $interval, $toObj);

        foreach ($period as $d) {
            $count = 0;
            $currentDay = $d->format("Y-m-d");

            foreach ($reservations as $reservation){
                $overlap = $this->dateIsInPeriod($currentDay, $reservation['from_date'], $reservation['to_date']);
                if($overlap){
                    $count++;
                }
            }

            if($count >= $hutRoomCount){
                return false;
            }
        }

        return true;
    }

    private function getAllReservationsOfHut($hutId){
        $db = new ReservationsDB();
        return $db->gerHutReservations($hutId);
    }

    private function getHutSize($hutId){
        $hutDB = new HutsDB();
        return $hutDB->getHutSize($hutId);
    }

    private function dateIsInPeriod($currentDay, $from, $to) {

        if($currentDay >= $from && $currentDay <= $to){
            return true;
        }

        return false;
    }

}