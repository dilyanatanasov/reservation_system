<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 7:47 PM
 */

require_once '../Common/Reservation.php';
require_once '../Common/RoomChecker.php';
require_once '../DB/ReservationsDB.php';

class ReservationController
{

    public function submitReservation(){
        $reservation = $this->createReservationFromPOST();
        $roomChecker = new RoomChecker();
        $isAvailable = $roomChecker->checkReservation($reservation->from, $reservation->to, $reservation->hut);

        if($isAvailable){
            $this->saveReservation($reservation);
            $message = "Reservation Saved";
        }else{
            $message = "No available rooms. Please pick new date range or pick another hut.";
        }

        return $message;
    }

    private function createReservationFromPOST(){
        if(!empty($_POST)){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $from = $_POST['from'];
            $to = $_POST['to'];
            $pay_day = date('Y-m-d', strtotime($to. ' + 10 days'));
            $hut = $_POST['hut'];

            $reservation = new Reservation($first_name, $last_name, $email, $phone, $from, $to, $pay_day, $hut);

            return $reservation;
        }
    }

    private function saveReservation($reservation){
        $db = new ReservationsDB();
        $db->insertReservation($reservation);
    }

}
