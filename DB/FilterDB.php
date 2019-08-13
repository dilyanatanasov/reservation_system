<?php
/**
 * Created by PhpStorm.
 * User: Dilyan
 * Date: 6.2.2019 г.
 * Time: 11:19 ч.
 */

require_once 'DB.php';

class FilterDB extends DB
{

    public function getFilterData($objFilters){

        $where = "WHERE 1 ";

        if(!empty($objFilters)){
            if($objFilters->hutId !== 0){
                $where .= " && H.`id_hut` = ".$objFilters->hutId;
            }

            if($objFilters->daysStay !== 0){
                $where .= " && R.`dateDiff` <= ".$objFilters->daysStay;
            }

            if($objFilters->capacity !== 0){
                $where .= " && H.`rooms` <= ".$objFilters->capacity;
            }

            if($objFilters->payDay !== ""){
                $where .= " && R.`pay_day` = '".$objFilters->payDay."'";
            }

            if($objFilters->priceForDay !== 0){
                $where .= " && H.`price` <= ".$objFilters->priceForDay;
            }
        }

        $stm = $this->conn->prepare($sql = "SELECT H.`name`, H.`address`, H.`rooms`, H.`price`, R.`first_name`, R.`last_name`, R.`email`, R.`phone`, R.`from_date`, R.`to_date`, `dateDiff`, R.`pay_day` 
                                            FROM (
                                              SELECT R.`hut_id`,R.`first_name`, R.`last_name`, R.`email`, R.`phone`, R.`from_date`, R.`to_date`, R.`pay_day`, DATEDIFF(R.`to_date`, R.`from_date`) as `dateDiff` 
                                              FROM `reservations` R
                                              ) R 
                                            INNER JOIN `huts` H ON R.`hut_id` = H.`id_hut`".$where.";");
        $stm->execute();
        $filteredResults = $stm->fetchAll();

        return $filteredResults;

    }
}
