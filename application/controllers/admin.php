<?php 

class admin extends CI_Controller{

    public function index(){
        $this->load->view('admin/dashboard');

    }

    public function Addquiz(){
        $this->load->view('admin/dummy1');
    }

}