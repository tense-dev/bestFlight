<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class backEnd extends CI_Controller {
	public function index()
	{
        $this->load->view('mainBack/mainBack.html');
        //phpinfo();
    }

   
    
}
