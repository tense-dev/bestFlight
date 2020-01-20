<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_programtour extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $pgtID;
public $pgtCountry;
public $pgtName;
public $pgtCode;
public $airline;
public $fileWord;
public $filePDF;
public $img;
public $highlight;
public $hotelStar;
public $pgtVisible;
public $pgtType;
public function DatatoObj($data)
{
$this->pgtID=$data->pgtID;
$this->pgtCountry=$data->pgtCountry;
$this->pgtName=$data->pgtName;
$this->pgtCode=$data->pgtCode;
$this->airline=$data->airline;
$this->fileWord=$data->fileWord;
$this->filePDF=$data->filePDF;
$this->img=$data->img;
$this->highlight=$data->highlight;
$this->hotelStar=$data->hotelStar;
$this->pgtVisible=$data->pgtVisible;
$this->pgtType=$data->pgtType;
}

public function ObjData()
{
$obj = array(
'pgtID'=>$this->pgtID,
'pgtCountry'=>$this->pgtCountry,
'pgtName'=>$this->pgtName,
'pgtCode'=>$this->pgtCode,
'airline'=>$this->airline,
'fileWord'=>$this->fileWord,
'filePDF'=>$this->filePDF,
'img'=>$this->img,
'highlight'=>$this->highlight,
'hotelStar'=>$this->hotelStar,
'pgtVisible'=>$this->pgtVisible,
'pgtType'=>$this->pgtType,
);
return $obj;
}
public function getListPg(){
    $this->db->select('*');       
    $this->db->from('programtour');  
    $query = $this->db->get();
    $result = $query->result();          
    return $result;      
}
public function getListCountry(){
    $this->db->select('*');       
    $this->db->from('country');  
    $this->db->where('Visible',1);
    $query = $this->db->get();
    $result = $query->result();          
    return $result;      
}
public function getListPromote(){
    $data = $this->db->query("CALL GetListPromoteProgramtour()");
    $result = $data->result();
    return $result;
}
public function getListPromotion(){
    $data = $this->db->query("CALL GetListPromotionProgramtour()");
    $result = $data->result();
    return $result;
}
public function getListLowPriceProgramtour(){
    $data = $this->db->query("CALL GetListLowPriceProgramtour()");
    $result = $data->result();
    return $result;
}
public function getListProgramtourByCountry(){
    $data = $this->db->query("CALL GetListProgramtourByCountry()");
    $result = $data->result();
    return $result;
}
public function getListProgramtourBySearch($datef, $datet, $codestr, $countryName){
    $data = $this->db->query("CALL getListProgramtourBySearch('{$datef}','{$datet}','{$codestr}','{$countryName}')");
    $result = $data->result();
    return $result;
}
public function getListProgramtourBySearchNotDate($codestr, $countryName){
    $data = $this->db->query("CALL getListProgramtourBySearchNotDate('{$codestr}','{$countryName}')");
    $result = $data->result();
    return $result;
}

}