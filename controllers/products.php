<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct(){
        parent::__construct();                
    }

    
    public function index()
    {   
        $this->load->library('../controllers/trans');
        $data['prodnames'] = $this->trans->prodnames();
        $this->load->view('inc/header_view');
        $this->load->view('prods_view', $data);
        $this->load->view('/inc/footer_view');
    }   
    
    public function pn($id=null)
    {   
        $this->load->library('../controllers/trans');        
        $data['prodcommt'] = $this->trans->prodcommt($id);
        $data['prodnames'] = $this->trans->prodnames($id);
        $this->load->view('inc/header_view');
        $this->load->view('prod_view', $data);
        $this->load->view('/inc/footer_view');
    }
        
}