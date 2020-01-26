<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SeachProgramTour extends CI_Controller {
	public function index()
	{
        $this->load->view('searchProgramTour/searchTour.html');
        //phpinfo();
    }
    public function getListCountryAll(){
        $modCountry = new Mod_country();
        $res = $modCountry->getListCountryAll();
        echo json_encode($res);
    }
    public function getListProgramtourBySearch(){
        $data =  json_decode($_POST['data']);
        $datef = $data->datef;
        $datet = $data->datet;
        $codestr = $data->codestr;
        $countryName = $data->countryName;
        $modpgt = new Mod_programtour();
        $res = $modpgt->getListProgramtourBySearch($datef, $datet, $codestr, $countryName);
        echo json_encode($res);
    }
    public function getListProgramtourBySearchNotDate(){
        $data =  json_decode($_POST['data']);
        $codestr = $data->codestr;
        $countryName = $data->countryName;
        $modpgt = new Mod_programtour();
        $res = $modpgt->getListProgramtourBySearchNotDate( $codestr, $countryName);
        echo json_encode($res);
    }

    
}
