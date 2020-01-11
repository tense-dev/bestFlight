<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_ticketplane extends CI_Model {
    public function __construct() {
    parent::__construct();;
    }
    public $ticketplane_oid;
    public $title;
    public $price;
    public $CreateDate;
    public $Visible;
    public $Description;
    public $Image;
    public function DatatoObj($data)
    {
    $this->ticketplane_oid=$data->ticketplane_oid;
    $this->title=$data->title;
    $this->price=$data->price;
    $this->CreateDate=$data->CreateDate;
    $this->Visible=$data->Visible;
    $this->Description=$data->Description;
    $this->Image=$data->Image;
    }
    
    public function ObjData()
    {
    $obj = array(
    'ticketplane_oid'=>$this->ticketplane_oid,
    'title'=>$this->title,
    'price'=>$this->price,
    'CreateDate'=>$this->CreateDate,
    'Visible'=>$this->Visible,
    'Description'=>$this->Description,
    'Image'=>$this->Image,
    );
    return $obj;
    }
    public function getListticketplane(){
        $this->db->select('*');       
        $this->db->from('ticketplane');  
        $this->db->where('Visible',1);
        $query = $this->db->get();
        $result = $query->result();          
        return $result;      
    }

     
    }