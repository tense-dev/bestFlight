<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_insurance extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $Name;
public $Description;
public $Visible;
public $ImagePath;
public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->Name=$data->Name;
$this->Description=$data->Description;
$this->Visible=$data->Visible;
$this->ImagePath=$data->ImagePath;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'Name'=>$this->Name,
'Description'=>$this->Description,
'Visible'=>$this->Visible,
'ImagePath'=>$this->ImagePath,
);
return $obj;
}
    public function getListinsurance(){
        $this->db->select('*');       
        $this->db->from('insurance');  
        $this->db->where('Visible',1);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }

   
}