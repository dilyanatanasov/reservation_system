<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 6:55 PM
 */

class Hut{

    public $name;
    public $address;
    public $rooms;
    public $extras;
    public $price;

    public function __construct($name, $address, $rooms, $extras, $price)
    {
        $this->name = $name;
        $this->address = $address;
        $this->rooms = $rooms;
        $this->extras = $extras;
        $this->price = $price;
    }

}

