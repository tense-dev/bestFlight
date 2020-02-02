<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_hotel extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $Location;
public $Room_type;
public $Hotel_type;
public $Time_period;
public $Price;

public function DataToObj($data){
    $this->ObjectID=$data->ObjectID;
    $this->Location=$data->Location;
    $this->Room_type=$data->Room_type;
    $this->Hotel_type=$data->Hotel_type;
    $this->Time_period=$data->Time_period;
    $this->Price=$data->Price;
}

public function ObjData(){
    $obj= array(
        'ObjectID'=>$this->ObjectID,
        'Location'=>$this->Location,
        'Room_type'=>$this->Room_type,
        'Hotel_type'=>$this->Hotel_type,
        'Time_period'=>$this->Time_period,
        'Price'=>$this->Price,
    );
    return  $obj;
}

public function getListHotelPlace($location,$type)
{
    $sql = " 
            SELECT * FROM hotel_price  WHERE Location = '".$location."' AND Hotel_type = ".$type;
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
}

public function getListentranceticket()
{
    $sql = " 
    SELECT * FROM entranceticket";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
}
}