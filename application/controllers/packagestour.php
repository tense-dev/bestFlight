<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class packagestour extends CI_Controller {
    public function index(){
        $this->load->view('home/packages_tour.html');
        //$this->load->view('home/single-blog.html');
    }
    
    public function getListIndependent1(){ //มัลดีฟ
        $this->load->model('Mod_packageIndependent');
        $dataresult = $this->Mod_packageIndependent->getListIndependent(3);
        echo json_encode($dataresult);
    }
    public function getListIndependent2(){//ล่องเรีือสำราญ
        $this->load->model('Mod_packageIndependent');
        $dataresult = $this->Mod_packageIndependent->getListIndependent(4);
        echo json_encode($dataresult);
    }
    public function getListIndependent3(){//--
        $this->load->model('Mod_packageIndependent');
        $dataresult = $this->Mod_packageIndependent->getListIndependent(5);
        echo json_encode($dataresult);
    }
    public function getListIndependent4(){//--
        $this->load->model('Mod_packageIndependent');
        $dataresult = $this->Mod_packageIndependent->getListIndependent(6);
        echo json_encode($dataresult);
    }
    
    
}
