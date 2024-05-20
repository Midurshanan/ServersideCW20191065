<?php 

class login extends CI_Controller{
    public function loginUser(){
        
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('Passwprd', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('login');
        }
        else{

            $this->load->model('Model_User');
            $result = $this->Model_User->loginUser();
         
            if ($result != false){

                $user_data = array(
                    'user_id'=>$result->id,
                    'name'=>$result->Name,
                    'email'=>$result->Email,
                    'loggedin'=>TRUE
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('welcome','Welcome back');
                redirect('admin/index');
            
            }


            else{
                $this->session->set_flashdata('errmsg','Wrong Email and Password');
                redirect('Welcome/login');
            }
        }
    
    
    }

    public function logoutuser(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('loggedin');
        redirect('Welcome/login');
    }





}


