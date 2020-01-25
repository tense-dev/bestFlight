<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_visa_details extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $visaOID;
public $documentation;
public $servicerate;
public $description;
public $remark;
public $path_upload1;
public $path_upload2;
public $type;
public $Country;

public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->visaOID=$data->visaOID;
$this->documentation=$data->documentation;
$this->servicerate=$data->servicerate;
$this->description=$data->description;
$this->remark=$data->remark;
$this->path_upload1=$data->path_upload1;
$this->path_upload2=$data->path_upload2;
$this->type=$data->type;
$this->Country=$data->Country;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'visaOID'=>$this->visaOID,
'documentation'=>$this->documentation,
'servicerate'=>$this->servicerate,
'description'=>$this->description,
'remark'=>$this->remark,
'path_upload1'=>$this->path_upload1,
'path_upload2'=>$this->path_upload2,
'type'=>$this->type,
'Country'=>$this->Country,
);
return $obj;
}

 

    public function getListvisa_detailsbyid($id){
        $sql = "
        SELECT
            t1.*
            ,t2.Country
        FROM
        visa_details t1
        left join visa t2 on t1.visaOID = t2.ObjectID
        WHERE t1.ObjectID = '".$id."'
        ";
        $query = $this->db->query($sql);
        $result = $query->result();          
        return $result;     
    }


    public function getListvisa_details($visaoid){
        $this->db->select('*');       
        $this->db->from('visa_details');  
        $this->db->where('visaOID',$visaoid);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }

   
}