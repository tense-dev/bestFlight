<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visa extends CI_Controller {
    public function index(){
        $this->load->view('visa/visa.html');
    }

    public function details(){
        $dataid['dataid'] = $this->uri->segment(3);
        $this->load->view('visa/visa_details.html',$dataid);
    }

    public function getListvisa(){//--
        $this->load->model('Mod_visa');
        $dataresult = $this->Mod_visa->getListvisa();
        echo json_encode($dataresult);
    }
    

    public function getListvisa_detailsbyid(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $id = $request->id;
        $this->load->model('Mod_visa_details');
        $dataresult = $this->Mod_visa_details->getListvisa_detailsbyid($id);
        echo json_encode($dataresult);
    }

    public function getListvisa_details(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $visaoid = $request->visaoid;
        $this->load->model('Mod_visa_details');
        $dataresult = $this->Mod_visa_details->getListvisa_details($visaoid);
        echo json_encode($dataresult);
    }

    



}
