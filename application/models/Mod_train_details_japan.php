<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_train_details_japan extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $train_oid;
public $ticket;
public $duration;
public $Adult;
public $Child;
public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->train_oid=$data->train_oid;
$this->ticket=$data->ticket;
$this->duration=$data->duration;
$this->Adult=$data->Adult;
$this->Child=$data->Child;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'train_oid'=>$this->train_oid,
'ticket'=>$this->ticket,
'duration'=>$this->duration,
'Adult'=>$this->Adult,
'Child'=>$this->Child,
);
return $obj;
}
    public function getListtrain_details_Japan($trainid){
        $this->db->select('*');       
        $this->db->from('train_detail_japan');  
        $this->db->where('train_oid',$trainid);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }
   
}