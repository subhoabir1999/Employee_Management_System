<?php

class Auth extends CI_Controller{


    // Function for user registration ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function register(){
        $this->load->model('Auth_model');

        if($this->Auth_model->authorized() == true){
            redirect(base_url().'index.php/Welcome');
		}

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() == false){
            $this->load->view('register');
        }
        else{
            // Save user record to database
            $this->load->model('Auth_model');
            $formArray = array();

            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $formArray['phone'] = $this->input->post('phone');
            // $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $formArray['password'] = $this->input->post('password');
            $formArray['created_at'] = date('Y-m-d');

            $this->Auth_model->create($formArray);

            $this->session->set_flashdata('msg', 'Account has been created successfully');
            redirect(base_url().'index.php/Auth/register');
        }
    }


    // Function for login a user :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function login(){
        $this->load->model('Auth_model');

        if($this->Auth_model->authorized() == true){
            redirect(base_url().'index.php/Welcome');
		}

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == true){
            $email = $this->input->post('email');
            $user = $this->Auth_model->checkUser($email);

            if(!empty($user)){
                $password = $this->input->post('password');
                // if(password_verify($password,$user['password']) == true){
                if($password == $user['password']){
                    $sessArray['id'] = $user['id'];
                    $sessArray['name'] = $user['name'];
                    $sessArray['email'] = $user['email'];
                    $this->session->set_userdata('user', $sessArray);

                    redirect(base_url().'index.php/Welcome');
                }
                else{
                    $this->session->set_flashdata('msg', 'Your password is incorrect');
                    redirect(base_url().'index.php/Auth/login');
                }
            }
            else{
                $this->session->set_flashdata('msg', 'Please enter your email correctly');
                redirect(base_url().'index.php/Auth/login');
            }
        }
        else{
            $this->load->view('login');
        }
    }


    // Function for logout a user ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    function logout(){
        $this->session->unset_userdata('user');
        redirect(base_url().'index.php/Auth/login');
    }
}
?>