<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 10:50 PM
 */

require_once '../Common/Hut.php';
require_once '../DB/HutsDB.php';

class HutController
{

    public function submitHut(){
        $hut = $this->createNewHutRegistration();

        if($this->saveHub($hut)){
            $message = "Hut Added To Database";
        }else{
            $message = "Error occured on data insertion";
        }

        return $message;
    }

    private function createNewHutRegistration(){
        if(!empty($_POST)){
            $name = $_POST['name'];
            $address = $_POST['address'];
            $rooms = $_POST['rooms'];
            $extras = $_POST['extras'];
            $price = $_POST['price'];

            $hut = new Hut($name, $address, $rooms, $extras, $price);

            return $hut;
        }
    }

    private function saveHub($hut){
        $db = new HutsDB();
        $db->insertHut($hut);

        return true;
    }

}