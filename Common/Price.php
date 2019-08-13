<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 11:28 PM
 */

class Price
{
    public $fromDate;
    public $toDate;
    public $hutId;

    public function __construct($fromDate, $toDate, $hutId)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->hutId = $hutId;
    }
}