<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/6/2019
 * Time: 10:12 PM
 */

require_once '../Common/PriceCalculator.php';

$price = new PriceCalculator();
$price->returnCalculatedPrice();