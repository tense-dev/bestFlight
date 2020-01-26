<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyou extends CI_Controller {
    public function index(){
        $this->load->view('home/message.html');
        //$this->load->view('home/single-blog.html');
    }

    
}
