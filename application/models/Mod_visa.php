<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_visa extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $Country;
public $ImagePath;
public $SubImagePath;
public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->Country=$data->Country;
$this->ImagePath=$data->ImagePath;
$this->SubImagePath=$data->SubImagePath;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'Country'=>$this->Country,
'ImagePath'=>$this->ImagePath,
'SubImagePath'=>$this->SubImagePath,
);
return $obj;
}
    public function getListvisa(){
        $this->db->select('*');       
        $this->db->from('visa');  
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }

   
}