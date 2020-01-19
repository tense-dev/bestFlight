<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hotel extends CI_Controller {
    public function index(){
        $this->load->view('hotel/hotel.html');
        //$this->load->view('home/single-blog.html');
    }
    public function disneylandhotel(){
        $this->load->view('hotel/disneylandhotel.html');
        //$this->load->view('home/single-blog.html');
    }
    public function universalhotel(){
        $this->load->view('hotel/universalhotel.html');
        //$this->load->view('home/single-blog.html');
    }
    public function macaohotel(){
        $this->load->view('hotel/macaohotel.html');
        //$this->load->view('home/single-blog.html');
    }
    public function sanriohotel(){
        $this->load->view('hotel/sanriohotel.html');
        //$this->load->view('home/single-blog.html');
    }
}