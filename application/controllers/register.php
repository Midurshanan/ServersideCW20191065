<?php 

class register extends CI_Controller{
    
    public function registerUser(){
        
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('Passwprd', 'Password', 'required');
        $this->form_validation->set_rules('confirm password', 'Confirm Password', 'required | matches[password]');
    

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('register');
        }
        else
        {
            $this->load->model('Model_User');
            $response = $this->Model_User->insertUserdata();
            if ($response){
                $this->session->set_flashdata('msg','Registered Successfully');
                redirect('Welcome/register');
            }
            else{
                $this->session->set_flashdata('msg','Something went wrong');
                redirect('Welcome/register');
            }
        }
    
    
    }

}