<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train extends CI_Controller {
    public function index(){
    }

    public function train_japan(){
        $this->load->view('train/train_japan.html');
    }

    public function train_europe(){
        $this->load->view('train/train_europe.html');
    }
    public function details(){
        $dataid['dataid'] = $this->uri->segment(3);
        $this->load->view('train/train_europe_details.html',$dataid);
    }


    //JAPAN
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
    //EUROUPPPPPPP
    public function getListtrainJEurope(){//--
        $this->load->model('Mod_train');
        $dataresult = $this->Mod_train->getListtrainJEurope();
        echo json_encode($dataresult);
    }

    public function getListtrain_details(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $train_id = $request->train_id;
        $this->load->model('Mod_train_details');
        $dataresult = $this->Mod_train_details->getListtrain_details($train_id);
        echo json_encode($dataresult);
    }
    public function getListtrain_details_bytrainid(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $train_id = $request->train_id;
        $this->load->model('Mod_train_details');
        $dataresult = $this->Mod_train_details->getListtrain_details_bytrainid($train_id);
        echo json_encode($dataresult);
    }


    public function getListtrain_details_euroup_Group(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $train_id = $request->train_id;
        $this->load->model('Mod_train_details');
        $dataresult = $this->Mod_train_details->getListtrain_details_euroup_Group($train_id);
        echo json_encode($dataresult);
    }

    public function getListtrain_details_euroup_bygroup(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $train_id = $request->train_id;
        $Group = $request->Group;
        $this->load->model('Mod_train_details');
        $dataresult = $this->Mod_train_details->getListtrain_details_byGroup($train_id,$Group);
        echo json_encode($dataresult);
    }

}
