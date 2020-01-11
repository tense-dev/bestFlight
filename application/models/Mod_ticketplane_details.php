

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_ticketplane_details extends CI_Model {
    public function __construct() {
    parent::__construct();;
    }
    public $ticketplane_details_id;
    public $ticketplane_id;
    public $airplan_id;
    public $ticket_form;
    public $ticket_to;
    public $ticket_price;
    public $CreateDate;
    public function DatatoObj($data)
    {
    $this->ticketplane_details_id=$data->ticketplane_details_id;
    $this->ticketplane_id=$data->ticketplane_id;
    $this->ticket_form=$data->ticket_form;
    $this->ticket_to=$data->ticket_to;
    $this->ticket_price=$data->ticket_price;
    $this->CreateDate=$data->CreateDate;
    }
    
    public function ObjData()
    {
    $obj = array(
    'ticketplane_details_id'=>$this->ticketplane_details_id,
    'ticketplane_oid'=>$this->ticketplane_oid,
    'ticket_form'=>$this->ticket_form,
    'ticket_to'=>$this->ticket_to,
    'ticket_price'=>$this->ticket_price,
    'CreateDate'=>$this->CreateDate,
    );
    return $obj;
    }
           public function getListticketplane_details_byticketplaneID($ticketplane_id){
                $this->db->select('*');       
                $this->db->from('ticketplane_details');  
                $this->db->where('ticketplane_id',$ticketplane_id);
                $this->db->order_by('CAST(ticket_price AS DECIMAL(10,2)) ASC');
                $query = $this->db->get();
                $result = $query->result();          
                return $result;      
            }
    }
    
    