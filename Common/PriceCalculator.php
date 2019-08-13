<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 7:05 PM
 */

require_once 'Price.php';
require_once 'Date.php';
require_once '../DB/PricesDB.php';

class PriceCalculator{

    private $priceDiscount = array(
        "standard" => 1,
        "minusTen" => 0.90,
        "minusFifteen" => 0.85
    );

    public function returnCalculatedPrice(){

        $reservation = $this->cretePriceFromGET();
        $stayPeriod = (Date::getDateDifference($reservation)) ? Date::getDateDifference($reservation) : 1;
        $priceForOneDay = $this->getPriceOfHut($reservation);
        $priceForPeriod = $priceForOneDay * $stayPeriod;

        if($stayPeriod <= 3){
            $priceForPeriod = round($priceForPeriod * $this->priceDiscount['standard'], 2);
        }else if($stayPeriod >= 4 && $stayPeriod <= 5){
            $priceForPeriod = round($priceForPeriod * $this->priceDiscount['minusTen'], 2);
        }else{
            $priceForPeriod = round($priceForPeriod * $this->priceDiscount['minusFifteen'],2);
        }

        echo "Price for the period: ".$priceForPeriod." lv";

    }


    private function cretePriceFromGET(){
        $from = $_GET['f'];
        $to = $_GET['t'];
        $hut = intval($_GET['h']);

        $price = new Price($from, $to, $hut);

        return $price;
    }

    private function getPriceOfHut($price){
        $db = new PricesDB();
        return $db->getHutPrice($price);
    }

}