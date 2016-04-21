<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model {
	public function db_create($post) {
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('time', 'Time', 'trim|required');
		$this->form_validation->set_rules('task', 'Task', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			return FALSE;
		}
		else {
			if ($post['date'] >= date('Y-m-d')) {
				$query = "INSERT INTO appointments (date,time,created_at,updated_at,user_id,status,task) VALUES (?,?,NOW(),NOW(),?,'pending',?)";
				$values = array(
					$post['date'],
					$post['time'],
					$this->session->userdata('id'),
					$post['task']
					);
				$this->db->query($query,$values);
				return true;
			}
			else {
				$this->session->set_userdata('error', 'Date is not valid');
				return false;
			}
		}
	}
	public function home(){
		$query = "SELECT appointments.id, appointments.task, appointments.date, appointments.time, appointments.status, TIMESTAMPDIFF(hour, appointments.date, NOW()) AS time_diff1, TIMESTAMPDIFF(year, appointments.date, NOW()) AS time_diff2 FROM appointments WHERE user_id = ?";
		return $this->db->query($query,$this->session->userdata('id'))->result_array();
	}
	public function db_destroy($id){
		$query = "DELETE FROM appointments WHERE id = ?";
		$this->db->query($query,$id);
	}
	public function db_edit_appt($id,$post){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('time', 'Time', 'trim|required');
		$this->form_validation->set_rules('task', 'Task', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			return FALSE;
		}
		else {
			if ($post['date'] >= date('Y-m-d')) {
				$check = "SELECT * FROM appointments WHERE date = ? AND time = ?";
				$check_val = array(
					$post['date'],
					$post['time']
					);
				$check_result = $this->db->query($check,$check_val)->result_array();
				if (count($check_result) == 0){
					$query = "UPDATE appointments SET appointments.date = ?, appointments.time = ?, appointments.status = ?, appointments.task = ? WHERE id= ?";
					$values = array(
						$post['date'],
						$post['time'],
						$post['status'],
						$post['task'],
						$id
						);
					$this->db->query($query,$values);
					return true;
				}
				else {
					$this->session->set_userdata('error', 'Date is not valid');
					return false;
				}
			}
			else {
				$this->session->set_userdata('error', 'Date is not valid');
				return false;
			}
		}
	}
}