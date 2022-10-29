<?php
class Auth_model extends CI_Model{

    // Model for user registration ::::::::::::::::::::::::::::::::::::::::::::::::::
    public function create($formArray){
        $this->db->insert('public.users', $formArray);
    }

    // Model for user login :::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function checkUser($email){
        $this->db->where('email', $email);
        return $row = $this->db->get('public.users')->row_array();
    }

    // Model for check user authorization (user is logged in or not) ::::::::::::::::
    function authorized(){
        if(!empty($this->session->userdata('user'))) {
            return true;
        }
        else{
            return false;
        }
    }
}
?>