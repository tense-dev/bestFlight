<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function index(){
        $booking['booking'] = '';
        $this->load->view('home/contact.html',$booking);
        //$this->load->view('home/single-blog.html');
    }

    public function booking(){
      //  $booking['booking'] = $this->uri->segment(3);
        $booking['booking'] = $this->input->get('title');
        $this->load->view('home/contact.html',$booking);
        //$this->load->view('home/single-blog.html');
    }

    public function send(){
        //$this->load->view('home/test.html');
        //$this->load->view('home/single-blog.html');
        $date= date("Y-m-d");
        $time=date("H:i:s");
        $datetime=$date."T".$time;
                $data = array('contact_name'=>$this->input->post('contact_name'),
                'contact_lastname'=>$_POST['contact_lastname'],
                'contact_phone'=>$_POST['contact_phone'],
                'contact_mobile'=>$_POST['contact_mobile'],
                'contact_fax'=>$_POST['contact_fax'],
                'contact_email'=>$_POST['contact_email'],
                'contact_country'=>$_POST['contact_country'],
                'contact_company'=>$_POST['contact_company'],
                'contact_address'=>$_POST['contact_address'],
                'contact_postcode'=>$_POST['contact_postcode'],
                'contact_description'=>$_POST['contact_description'],
                'CreateDate'=>$datetime,
                );
                $this->load->model('Mod_contact');
                $this->Mod_contact->insert($data);
            $this->load->helper('url');
            redirect('/thankyou');
    }
    
}
