<?php
/**
 * Created by PhpStorm.
 * User: Dilyan
 * Date: 6.2.2019 г.
 * Time: 11:29 ч.
 */

class Filter
{
    public $hutId;
    public $daysStay;
    public $capacity;
    public $payDay;
    public $priceForDay;

    public function __construct($hutId, $daysStay, $capacity, $payDay, $priceForDay)
    {
        $this->hutId = $hutId;
        $this->daysStay = $daysStay;
        $this->capacity = $capacity;
        $this->payDay = $payDay;
        $this->priceForDay = $priceForDay;
    }

}