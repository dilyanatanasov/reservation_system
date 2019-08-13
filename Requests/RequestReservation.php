<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/6/2019
 * Time: 10:12 PM
 */

require_once '../Controller/ReservationController.php';

$reservation = new ReservationController();
echo $reservation->submitReservation();