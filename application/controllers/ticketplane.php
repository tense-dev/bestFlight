<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticketplane extends CI_Controller {
    public function index(){

    }

    public function airwayscountry(){
        $this->load->view('ticketplane/airwayscountry.html');
    }
    public function airwaysthai(){
        $this->load->view('ticketplane/airwaysthai.html');
    }
    public function airwayslowcost(){
        $this->load->view('ticketplane/airwayslowcost.html');
    }
    public function airwaysstudent(){
        $this->load->view('ticketplane/airwaysstudent.html');
    }

    public function details(){
        $dataid['ticketplane_id'] = $this->uri->segment(3);
        $this->load->view('ticketplane/airwaysDatails.html',$dataid);
    }

    public function getListticketplane(){
        $this->load->model('Mod_ticketplane');
        $dataresult = $this->Mod_ticketplane->getListticketplane(6);
        echo json_encode($dataresult);
    }

    public function getticketplane_byid(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $id = $request->id;
        $this->load->model('Mod_ticketplane');
        $dataresult = $this->Mod_ticketplane->getticketplane_byid($id );
        echo json_encode($dataresult);
    }

    

    public function getListticketplane_details_byticketplaneID(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $ticketplane = $request->ticketplane_id;
        $this->load->model('Mod_ticketplane_details');
        $dataresult = $this->Mod_ticketplane_details->getListticketplane_details_byticketplaneID($ticketplane);
        echo json_encode($dataresult);
    }

    public function getListticketplane_details_bymenuid(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $ticketplanmenu_id = $request->ticketplanmenu_id;
        $this->load->model('Mod_ticketplane_details');
        $dataresult = $this->Mod_ticketplane_details->getListticketplane_details_bymenuid($ticketplanmenu_id);
        echo json_encode($dataresult);
    }


    

}
