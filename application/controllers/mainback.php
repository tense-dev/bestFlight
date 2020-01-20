<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class mainBack extends CI_Controller {
	public function index()
	{
        $this->load->view('mainBack/login.html');
        //phpinfo();
    }

    public function getListTrain(){
        $modTrain = new Mod_train();
    }

    
}
