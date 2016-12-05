<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shapew extends CI_Controller {
	
    public function index()
    {
        $this->load->view('inc/header_view');
        $this->load->view('front_view');
        $this->load->view('inc/footer_view');
    }

    public function product($id= null ){
        $this->load->view('inc/header_view');
        $this->load->view('prod_view');
        $this->load->view('inc/footer_view');
    }
}
