<?php

class Crud_model extends CI_Model{
    
    /*
     *
     */  
    public function create($data = null){             
        foreach($data as $entk => $entv){
            $this->db->set($entk, $entv);                        
        }         
        $this->db->insert('comreg');
        $this->update($data);
        return true;      
    }
     
    /*
     * USAGE: Pass 3 items in array form 
     * data[0] = user
     * data[1] = product
     * data[2] = message
     */  
    public function update($data=null){
        $ltime = date('Y-m-d H:i:s');
        $q = $this->db->get_where('viewreg', array('vie_usrid'=>$data['com_usrid'], 'vie_proid'=>$data['com_proid']) );       
        if($q->num_rows() > 0){
        $q1 = $q->result_array();
        $this->db->set('vie_ltime', $ltime);
        $this->db->where('vie_id', $q1[0]['vie_id']);                        
        $this->db->update('viewreg');        
        }else{
            foreach($data as $entk => $entv){
                if($entk == 'com_proid'){
                    $query = $this->db->get_where('products',array('prod_id' => $entv)); $kval = $query->row_array(); $this->db->set('vie_proid', $kval['prod_id']);    
                }elseif($entk == 'com_usrid'){
                    $query = $this->db->get_where('users',array('usr_id' => $entv)); $kval = $query->row_array(); $this->db->set('vie_usrid', $kval['usr_id']);                
                }            
            }//we dont need the review posting
            $this->db->set('vie_ltime', $ltime);
            $this->db->insert('viewreg');
        }
        return true;
    }
    
    /*
     * USAGE: Pass User ID in array form to delete
     * data[0] = messageID
     */
    public function delete(){
        
    }
    
    /*     
     * USAGE: Pass items in array form to return match
     * 
     */
    public function get($data = null){
        if(isset($data['cols'])){
            $this->db->select($data['cols']);
        }
        if(isset($data['name'])){
            
            $this->db->where($data['col'],$data['name']);
        }
        if($data['table']==='comreg'){
            $this->db->join('users', 'users.usr_id = comreg.com_usrid', 'inner');
            $this->db->order_by('com_id', 'ASC');
        }
        
        $q = $this->db->get($data['table']);                        
        return $q->result_array();
    }
    
    /*     
     * USAGE: Pass items in array form to return match
     *  
     */
    public function getmsgcount($data=null){
        $query1 = $this->db->get_where('viewreg', $data);        
        $q1 = $query1->row_array(0);        
        $query2 = $this->db->get_where('comreg', array('com_proid'=>$q1['vie_proid'], 'com_time >'=>$q1['vie_ltime']));
        return $query2->num_rows();
    }
}