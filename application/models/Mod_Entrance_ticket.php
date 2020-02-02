<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_Entrance_ticket extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $Card_type;
public $Adult;
public $Child;
public $Senior;

public function DataToObj($data){
    $this->ObjectID=$data->ObjectID;
    $this->Card_type=$data->Card_type;
    $this->Adult=$data->Adult;
    $this->Child=$data->Child;
    $this->Senior=$data->Senior;
}

public function ObjData(){
    $obj= array(
        'ObjectID'=>$this->ObjectID,
        'Card_type'=>$this->Card_type,
        'Adult'=>$this->Adult,
        'Child'=>$this->Child,
        'Senior'=>$this->Senior,
    );
    return  $obj;
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