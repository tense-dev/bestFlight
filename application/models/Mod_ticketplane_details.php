

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
    public $airplan_name;
    public $airplan_icon;
    public function DatatoObj($data)
    {
    $this->ticketplane_details_id=$data->ticketplane_details_id;
    $this->ticketplane_id=$data->ticketplane_id;
    $this->ticket_form=$data->ticket_form;
    $this->ticket_to=$data->ticket_to;
    $this->ticket_price=$data->ticket_price;
    $this->CreateDate=$data->CreateDate;
    $this->airplan_name=$data->airplan_name;
    $this->airplan_icon=$data->airplan_icon;
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
    'airplan_name'=>$this->airplan_name,
    'airplan_icon'=>$this->airplan_icon,
    );
    return $obj;
    }
   
    
    public function getListticketplane_details_byticketplaneID($ticketplane_id){
        $sql = "
            SELECT
            t1.*
            ,t2.Airline_Name_TH as airplan_name
            ,t2.icon as airplan_icon
            FROM
            ticketplane_details t1
            LEFT JOIN airlinecode t2 on t2.AirlineCodeID = t1.airplan_id
            WHERE t1.ticketplanemenu_id = 1
            AND t1.ticketplanemenu_id = ".$ticketplane_id."
            ORDER BY CAST(t1.ticket_price AS DECIMAL(10,2))  ASC , ticket_to ASC
        ";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
    }



    
    public function getListticketplane_details_bymenuid($ticketplanmenu_id){
        $sql = "
            SELECT
            t1.*
            ,t2.Airline_Name_TH as airplan_name
            ,t2.icon as airplan_icon
            FROM
            ticketplane_details t1
            LEFT JOIN airlinecode t2 on t2.AirlineCodeID = t1.airplan_id 
            WHERE ticketplanemenu_id = ".$ticketplanmenu_id."
            ORDER BY CAST(t1.ticket_price AS DECIMAL(10,2))  ASC , ticket_to ASC
        ";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
    }

}
    
    