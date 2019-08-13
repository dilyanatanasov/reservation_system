<?php
/**
 * Created by PhpStorm.
 * User: Dilyan
 * Date: 6.2.2019 г.
 * Time: 11:51 ч.
 */

class Date
{

    public static function getDateDifference($objDate){
        $from = new DateTime($objDate->fromDate, new DateTimeZone('UTC'));
        $to = new DateTime($objDate->toDate, new DateTimeZone('UTC'));

        $interval = $from->diff($to);
        return $interval->format('%a');
    }

}