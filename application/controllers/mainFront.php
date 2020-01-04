<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class mainFront extends CI_Controller {
	public function index()
	{
        $this->load->view('index.html');
    }
    public function kuy(){
        $this->load->view('home/home.html');
    }
    public function getLtProgramtour(){
        $objag = new Mod_programtour();
        $dataresult = $objag->getListPg();
        echo json_encode($dataresult);
    }
    public function getListPromote(){
        $objpg = new Mod_programtour();
        $dataresult = $objpg->getListPg();
        echo json_encode($dataresult);
    }
    public function getListPromotion(){
        $objpg = new Mod_programtour();
        $dataresult = $objpg->getListPromotion();
        echo json_encode($dataresult);
    }
    
}
