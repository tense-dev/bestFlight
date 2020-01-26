<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function index(){
        $this->load->view('home/about.html');
        //$this->load->view('home/single-blog.html');
    }

    
}
