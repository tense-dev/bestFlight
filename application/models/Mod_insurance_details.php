<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_insurance_details extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $insuranceOID;
public $Name;
public $coverage;
public $condition;
public $price;
public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->insuranceOID=$data->insuranceOID;
$this->Name=$data->Name;
$this->coverage=$data->coverage;
$this->condition=$data->condition;
$this->price=$data->price;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'Name'=>$this->Name,
'insuranceOID'=>$this->insuranceOID,
'coverage'=>$this->coverage,
'condition'=>$this->condition,
'price'=>$this->price,
);
return $obj;
}

public function getListinsurance_details_byid($id){
    $this->db->select('*');       
    $this->db->from('insurance_detail');  
    $this->db->where('ObjectID',$id);
    $query = $this->db->get();
    $result = $query->result();          
    return $result;      
}


    public function getListinsurance_details_byheaderid($insuranceOID){
        $this->db->select('*');       
        $this->db->from('insurance_detail');  
        $this->db->where('insuranceOID',$insuranceOID);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }

   
}