<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Trans extends CI_Controller {

    public function __construct(){
        parent::__construct();                
    }

    public function index()
    {        
        redirect('/products');
    }
    
    public function prodnames($id=null){
        $this->load->model('crud_model');   	   
        $data['table'] = 'products';
        $data['col'] = 'prod_id';
        if($id != null){
            $data['name'] = $id;
        }       
        $q = $this->crud_model->get($data);
        return $q;
    }
    
    public function prodcommt($id=null){
        $this->load->model('crud_model');   	   
        $data['table'] = 'comreg';
        $data['col'] = 'com_proid';
        $data['uname'] = 'true';
        if($id != null){
            $data['name'] = $id;
        }       
        $q = $this->crud_model->get($data);
        return $q;
    }
    
    public function addcomm(){
        $this->load->model('crud_model');
        $this->output->set_content_type('application_json'); 
        $data = array('com_rev' => $this->input->post('usr_comment'),
            'com_proid' => $this->input->post('prod_id'),
            'com_usrid' => $this->session->userdata('user_id'));        
        $result = $this->crud_model->create($data);
        if($result){                        	    
            $this->output->set_output(json_encode(['result' => 1]));                        
        }else{            
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'Something went wrong']));                        
        }
        
    }
    
    public function updateview($data=null){
        $this->load->model('crud_model');
        $data = array('com_proid' => $this->input->post('prod_id'),
            'com_usrid' => $this->session->userdata('user_id'));        
        $result = $this->crud_model->update($data);
        if($result){                        
	    $this->output->set_output(json_encode(['result' => 1, 'count' => $result]));
        }else{            
            $this->output->set_output(json_encode(['result' => 0, 'count' => '0']));                        
        }
    }
    
    public function missmsgcount(){        
        $this->load->model('crud_model');
        $id = $this->input->post('prod_id');
        $this->output->set_content_type('application_json'); 
        $uid =$this->session->userdata('user_id');        
        $data = array('vie_proid' => $id, 'vie_usrid' => $uid); 
        $result = $this->crud_model->getmsgcount($data);
        if($result){                        
	    $this->output->set_output(json_encode(['result' => 1, 'count' => $result]));
        }else{            
            $this->output->set_output(json_encode(['result' => 0, 'count' => '0']));                        
        }
    }
    
    public function login(){
        $this->load->model('user_model');   		
        $this->output->set_content_type('application_json'); 
        $eml = $this->input->post('email');
        $password = $this->input->post('password');
        $password = hash( "sha256", $password );
        $data =  array('usr_eml'=>$eml, 'usr_pass'=>$password);
        $result = $this->user_model->get($data);        
        if($result){                        
	    $this->session->set_userdata(['user_id' => $result[0]['usr_id'], 'user_name' => $result[0]['usr_fullnm']]);            
            $this->output->set_output(json_encode(['result' => 1]));                        
        }else{            
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'Email/Password Combination error']));                        
        }
    }
    
    public function join(){
        $this->load->model('user_model');   		
        $login = $this->input->post('jemail');
        $password = $this->input->post('jpassword');
        $fullnm = $this->input->post('jfullname');
        $password = hash( "sha256", $password );
        $data =  array('usr_eml'=>$login, 'usr_pass'=>$password, 'usr_fullnm'=>$fullnm );
        $result = $this->user_model->create($data);
        $this->output->set_content_type('application_json'); 
        if($result){
	    $this->session->set_userdata(['user_id' => $result, 'user_name' => $fullnm]);                        
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'Email address already exists']));
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/products');	
    }
}