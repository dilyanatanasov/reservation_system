<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 9:19 PM
 */

class Reservation
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone ;
    public $from;
    public $to;
    public $pay_day;
    public $hut;

    public function __construct($first_name, $last_name, $email, $phone, $from, $to, $pay_day, $hut)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->from = $from;
        $this->to = $to;
        $this->pay_day = $pay_day;
        $this->hut = $hut;

    }
}