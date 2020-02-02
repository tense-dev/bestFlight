<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PdfReader extends CI_Controller {
	public function index()
	{
        $this->load->view('genpdf/genpdf.php');
        //phpinfo();
    }
    public function preview()
	{
        $pdf_file['pdf_file'] = $this->input->post('pdf_file');
        $this->load->view('genpdf/genpdf.php',$pdf_file);
    }
    public function preview1()
	{
        $pdf_file['pdf_file'] = $this->input->get('pdf');
        $this->load->view('genpdf/genpdf.php',$pdf_file);
    }

}
