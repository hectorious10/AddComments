<?php

class User_model extends CI_Model{
    
    /*
     * USAGE: Pass 3 items in array form 
     * data[0] = EMAIL
     * data[1] = password
     * data[2] = Full Name
     */    
    public function create($data = null){        
        if($this->get($data)){
            return false; 
        }else{        
        foreach($data as $_key => $_value){
            $this->db->set($_key, $_value);
        }                   
        $this->db->insert('users');
        return $this->db->insert_id();    
        }
    }
     
    /*
     * USAGE: Pass items in array form to modify
     * data[0] = userID
     * data[1] = EMAIL
     * data[2] = password
     * data[3] = Full Name
     */
    public function update(){
        
    }
    
    /*
     * USAGE: Pass User ID in array form to delete
     * data[0] = userID  
     */
    public function delete(){
        
    }
    
    /*     
     * USAGE: Pass items in array form to return match
     * data[0] = EMAIL
     * data[1] = password
     */
    public function get($data = null){                
        $sql = "SELECT * FROM users WHERE usr_eml ='" . $data['usr_eml'] . "' AND usr_pass =" . "'" . $data['usr_pass'] . "'";        
        $this->db->limit(1);
        $query =  $this->db->query($sql);
        
        if ($query->num_rows() == 1) {
            return $query->result_array();            
        } else {
            return false;               
        }
    }
    
}