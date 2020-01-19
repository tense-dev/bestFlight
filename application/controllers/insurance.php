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

}
