<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class packagespass extends CI_Controller {
    public function index(){
        $this->load->view('home/packages_pass.html');
        //$this->load->view('home/single-blog.html');
    }

    public function getltAsiaPass(){
        $this->load->model('Mod_packageIndependent');
        $dataresult = $this->Mod_packageIndependent->getListAsiaPass();
        echo json_encode($dataresult);
    }

    public function getltJapan(){
        $this->load->model('Mod_packageIndependent');
        $dataresult = $this->Mod_packageIndependent->getListJapan();
        echo json_encode($dataresult);
    }

}
