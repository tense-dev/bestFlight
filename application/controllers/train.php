<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class train extends CI_Controller {
    public function index(){
    }

    public function train_japan(){
        $this->load->view('train/train_japan.html');
    }
    public function train_europe(){
        $this->load->view('train/train_europe.html');
    }

    public function getListtrainJapan(){//--
        $this->load->model('Mod_train');
        $dataresult = $this->Mod_train->getListtrainJapan();
        echo json_encode($dataresult);
    }

    public function getListtrain_details_Japan(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $train_oid = $request->train_oid;
        $this->load->model('Mod_train_details_japan');
        $dataresult = $this->Mod_train_details_japan->getListtrain_details_Japan($train_oid);
        echo json_encode($dataresult);
    }
   

    

}
