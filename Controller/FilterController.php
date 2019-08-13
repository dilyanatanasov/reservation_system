<?php
/**
 * Created by PhpStorm.
 * User: Dilyan
 * Date: 6.2.2019 г.
 * Time: 11:29 ч.
 */

require_once '../DB/FilterDB.php';
require_once '../Common/Filter.php';

class FilterController
{

    public function getFilteredData(){
        $filterData = $this->collectDataFromFilter();
        $filterResults = $this->getFilteredResults($filterData);
        foreach ($filterResults as $filter){
            echo "<tr>
                    <td>".$filter['name']."</td>
                    <td>".$filter['dateDiff']."</td>
                    <td>".$filter['rooms']."</td>
                    <td>".$filter['pay_day']."</td>
                    <td>".$filter['price']."</td>
                  </tr>";
        }
    }

    private function collectDataFromFilter(){
        $hutId = (!empty($_POST['hutName'])) ? $_POST['hutName'] : 0;
        $daysStay = (!empty($_POST['daysStay'])) ? $_POST['daysStay'] : 0;
        $capacity = (!empty($_POST['capacity'])) ? $_POST['capacity'] : 0;
        $payDay = (!empty($_POST['payDay'])) ? $_POST['payDay'] : "";
        $priceForDay = (!empty($_POST['priceForDay'])) ? $_POST['priceForDay'] : 0;

        $filter = new Filter($hutId, $daysStay, $capacity, $payDay, $priceForDay);

        return $filter;
    }

    private function getFilteredResults($filters){
        $filterDB = new FilterDB();

        return $filterDB->getFilterData($filters);
    }

}