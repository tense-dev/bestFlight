<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MainFront extends CI_Controller {
	public function index()
	{
        $this->load->view('index.html');
    }
   
    public function packagestour(){
        $this->load->view('packages_tour.html');
    }

    public function getLtProgramtour(){
        $objag = new Mod_programtour();
        $dataresult = $objag->getListPg();
        echo json_encode($dataresult);
    }
    public function getListPromote(){
        $objpg = new Mod_programtour();
        $dataresult = $objpg->getListPromote();
        echo json_encode($dataresult);
    }
    public function getListPromotion(){
        $objpg = new Mod_programtour();
        $dataresult = $objpg->getListPromotion();
        echo json_encode($dataresult);
    }
    public function getListProgramtourByCountry(){
        $objpg = new Mod_programtour();
        $dataresult = $objpg->getListProgramtourByCountry();
        echo json_encode($dataresult);
    }
    public function getListLowPriceProgramtour(){
        $objpg = new Mod_programtour();
        $dataresult = $objpg->getListLowPriceProgramtour();
        echo json_encode($dataresult);
    }
    
}
