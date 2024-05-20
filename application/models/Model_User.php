<?php 

class Model_User extends CI_Model{

function insertUserdata(){

    $data = array(

        'Name'=> $this->input->post('Name',TRUE),
        'Email'=> $this->input->post('Email',TRUE),
        'Password'=>sha1($this->input->post('Passwprd',TRUE)),

    );

    return $this->db->insert('users',$data);

}

function loginUser(){

    $Email = $this->input->post('Email');
    $Password = sha1($this->input->post('Passwprd'));

    $this->db->where('Email',$Email);
    $this->db->where('Password',$Password);
    
    $respond = $this->db->get('users');
    if($respond->num_rows() ==1){
        return $respond->row(0);
    
    }
    else{
    
    return false;

    }
}

}