<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_packageIndependent extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $Name;
public $Description;
public $Price_title;
public $Price;
public $Seq;
public $Visible;
public $ImagePath;
public $mst_packagepass_id;
public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->Name=$data->Name;
$this->Description=$data->Description;
$this->Price_title=$data->Price_title;
$this->Price=$data->Price;
$this->Seq=$data->Seq;
$this->Visible=$data->Visible;
$this->ImagePath=$data->ImagePath;
$this->mst_packagepass_id=$data->mst_packagepass_id;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'Name'=>$this->Name,
'Description'=>$this->Description,
'Price_title'=>$this->Price_title,
'Price'=>$this->Price,
'Seq'=>$this->Seq,
'Visible'=>$this->Visible,
'ImagePath'=>$this->ImagePath,
'mst_packagepass_id'=>$this->mst_packagepass_id,
);
return $obj;
}
    public function getListAsiaPass(){
        $this->db->select('*');       
        $this->db->from('packageindependent');  
        $this->db->where('mst_packagepass_id',1);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }
    public function getListJapan(){
        $this->db->select('*');       
        $this->db->from('packageindependent');  
        $this->db->where('mst_packagepass_id',2);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }

    public function getListIndependent($param){
        $this->db->select('*');       
        $this->db->from('packageindependent');  
        $this->db->where('mst_packagepass_id',$param);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }
}