<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_country extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $CountryID;
public $ZoneID;
public $Country_Code;
public $Country_EN;
public $Country_TH;
public $Visible;
public $Delete;
public $Create_By;
public $Create_Date;
public $content_country;
public $Visa_count_date_G;
public $Visa_use;
public $Commission_By_Zone;
public $Visa_count_date_Y;
public $Icon;
public $Content;
public $Img_view;
public function DatatoObj($data)
{
$this->CountryID=$data->CountryID;
$this->ZoneID=$data->ZoneID;
$this->Country_Code=$data->Country_Code;
$this->Country_EN=$data->Country_EN;
$this->Country_TH=$data->Country_TH;
$this->Visible=$data->Visible;
$this->Delete=$data->Delete;
$this->Create_By=$data->Create_By;
$this->Create_Date=$data->Create_Date;
$this->content_country=$data->content_country;
$this->Visa_count_date_G=$data->Visa_count_date_G;
$this->Visa_use=$data->Visa_use;
$this->Commission_By_Zone=$data->Commission_By_Zone;
$this->Visa_count_date_Y=$data->Visa_count_date_Y;
$this->Icon=$data->Icon;
$this->Content=$data->Content;
$this->Img_view=$data->Img_view;
}

public function ObjData()
{
$obj = array(
'CountryID'=>$this->CountryID,
'ZoneID'=>$this->ZoneID,
'Country_Code'=>$this->Country_Code,
'Country_EN'=>$this->Country_EN,
'Country_TH'=>$this->Country_TH,
'Visible'=>$this->Visible,
'Delete'=>$this->Delete,
'Create_By'=>$this->Create_By,
'Create_Date'=>$this->Create_Date,
'content_country'=>$this->content_country,
'Visa_count_date_G'=>$this->Visa_count_date_G,
'Visa_use'=>$this->Visa_use,
'Commission_By_Zone'=>$this->Commission_By_Zone,
'Visa_count_date_Y'=>$this->Visa_count_date_Y,
'Icon'=>$this->Icon,
'Content'=>$this->Content,
'Img_view'=>$this->Img_view,
);
return $obj;
}
public function getListCountryAll(){
    $this->db->select('*');       
    $this->db->from('country');  
    $this->db->where('Visible',1);
    $qry = $this->db->get();
    $res = $qry->result();          
    return $res;      
}
}