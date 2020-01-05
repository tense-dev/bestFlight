<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class packagestour extends CI_Controller {
    public function index(){
        $this->load->view('packages_tour.html');
    }
}
