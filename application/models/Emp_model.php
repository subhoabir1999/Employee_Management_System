<?php
class Emp_model extends CI_Model{
    // Insert a new emp to database ::::::::::::::::::::::::::::::::::::
    function createEmp($empArray){
        $this->db->insert('public.employee', $empArray);
    }

    // SELECT * from 'employee' table ::::::::::::::::::::::::::::::::::
    function allEmp(){
        return $this->db->get('public.employee')->result_array();
    }

    // SELECT * from 'employee' where emp_id = ? ::::::::::::::::::::::::
    function getEmp($empId){
        $this->db->where('emp_id', $empId);
        return $this->db->get('public.employee')->row_array();
    }

    // Update 'employee' SET name=?, email=? ....... where emp_id=? ::::::
    function updateEmp($empId, $empArray){
        $this->db->where('emp_id', $empId);
        $this->db->update('public.employee', $empArray);
    }

    // DELETE from 'employee' where emp_id = ? ::::::::::::::::::::::::::::
    function deleteEmp($empId){
        $this->db->where('emp_id', $empId);
        $this->db->delete('public.employee');
    }
}
?>