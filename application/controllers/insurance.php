<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class insurance extends CI_Controller {
    public function index(){
        $this->load->view('insurance/insurance.html');
    }
    
    public function details(){
        $dataid['dataid'] = $this->uri->segment(3);
        $this->load->view('insurance/insurance_details.html',$dataid);
    }

    
    public function getListinsurance(){
        $this->load->model('Mod_insurance');
        $dataresult = $this->Mod_insurance->getListinsurance();
        echo json_encode($dataresult);
    }
    
    public function getListinsurance_details_byid(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $id = $request->id;
        $this->load->model('Mod_insurance_details');
        $dataresult = $this->Mod_insurance_details->getListinsurance_details_byid($id);
        echo json_encode($dataresult);
    }

    public function getListinsurance_details_byheaderid(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $insuranceOID = $request->insuranceOID;
        $this->load->model('Mod_insurance_details');
        $dataresult = $this->Mod_insurance_details->getListinsurance_details_byheaderid($insuranceOID);
        echo json_encode($dataresult);
    }



    

}
