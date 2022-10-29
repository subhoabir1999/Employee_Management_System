<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('Auth_model');
		if($this->Auth_model->authorized() == false){
			$this->session->set_flashdata('msg', 'Please login first');
            redirect(base_url().'index.php/Auth/login');
		}

		// $user = $this->session->userdata('user');
		// $data['user'] = $user;

		$this->load->model('Emp_model');
		$emps = $this->Emp_model->allEmp();
		$emp = array();
		$emp['emps'] = $emps;

		// $this->load->view('home', $emp, $data);	
		$this->load->view('home', $emp);	
	}


	// Function for create an employee ::::::::::::::::::::::::::::::::::::::::::::::::::::
	function create(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employee.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('job', 'Job', 'required');
		$this->form_validation->set_rules('salary', 'Salary', 'required|numeric');

		if($this->form_validation->run() == false){
            $this->load->view('create');
        }
        else{
            // Save employee record to database
            $this->load->model('Emp_model');
            $empArray = array();

            $empArray['name'] = $this->input->post('name');
            $empArray['email'] = $this->input->post('email');
            $empArray['phone'] = $this->input->post('phone');
            $empArray['address'] = $this->input->post('address');
            $empArray['job_dept'] = $this->input->post('job');
            $empArray['salary'] = $this->input->post('salary');
          
            $empArray['joined_at'] = date('Y-m-d');

            $this->Emp_model->createEmp($empArray);

            $this->session->set_flashdata('msg', 'A new Employee added Successfully');
            redirect(base_url().'index.php/Welcome');
        }
    }      


	// Function for edit an employee details :::::::::::::::::::::::::::::::::::::::::::::::::;
	function edit($empId){
		$this->load->model('Emp_model');
		$emp = $this->Emp_model->getEmp($empId);
		$data = array();
		$data['emp'] = $emp;

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('job', 'Job', 'required');
		$this->form_validation->set_rules('salary', 'Salary', 'required|numeric');

		if($this->form_validation->run() == false){
			$this->load->view('edit', $data);
		}
		else{
			$empArray = array();

            $empArray['name'] = $this->input->post('name');
            $empArray['email'] = $this->input->post('email');
            $empArray['phone'] = $this->input->post('phone');
            $empArray['address'] = $this->input->post('address');
            $empArray['job_dept'] = $this->input->post('job');
            $empArray['salary'] = $this->input->post('salary');
			$emp = $this->Emp_model->updateEmp($empId, $empArray);

			$this->session->set_flashdata('msg', 'Employee details updated successfully');
            redirect(base_url().'index.php/Welcome');
		}
	}


	// Function for delete an employee :::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	function delete($empId){
		// if(confirm('Are you sure to remove this record ?')){
		$this->load->model('Emp_model');
		$emp = $this->Emp_model->deleteEmp($empId);
		$this->session->set_flashdata('msg', 'Deleted successfully');
        redirect(base_url().'index.php/Welcome');
		// }
	}

    }
?>