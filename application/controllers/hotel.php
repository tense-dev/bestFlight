<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
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
    public function getListHotelBylocationType(){//--
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $location = $request->location;
        $type = $request->type;
        $this->load->model('Mod_hotel');
        $dataresult = $this->Mod_hotel->getListHotelPlace($location,$type);
        echo json_encode($dataresult);
    }

    public function getListEntranceTicket(){
        $this->load->model('Mod_Entrance_ticket');
        $dataresult = $this->Mod_Entrance_ticket->getListentranceticket();
        echo json_encode($dataresult);
    }
}