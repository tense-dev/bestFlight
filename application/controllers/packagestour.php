<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class packagestour extends CI_Controller {
    public function index(){
        $this->load->view('home/packages_tour.html');
        //$this->load->view('home/single-blog.html');
    }
}
