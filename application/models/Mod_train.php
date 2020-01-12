<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_train extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $Code;
public $Name;
public $Description;
public $Visible;
public $ImagePath;
public $region;
public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->Code=$Code->Code;
$this->Name=$data->Name;
$this->Description=$data->Description;
$this->Visible=$data->Visible;
$this->ImagePath=$data->ImagePath;
$this->region=$data->region;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'Code'=>$this->Code,
'Name'=>$this->Name,
'Description'=>$this->Description,
'Visible'=>$this->Visible,
'ImagePath'=>$this->ImagePath,
'region'=>$this->region,
);
return $obj;
}
    public function getListtrainJapan(){
        $this->db->select('*');       
        $this->db->from('train');  
        $this->db->where('Visible',1);
        $this->db->where('region','Japan');
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }
   
}