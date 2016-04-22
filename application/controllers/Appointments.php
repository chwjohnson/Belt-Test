<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Appointment');
	}
	public function create() {
		$result = $this->Appointment->db_create($this->input->post());
		if ($result) {
			redirect('/logins');
		}
		else {
			$result = $this->Appointment->home();
			$this->load->view('home',array('result'=>$result));
		}
		
	}

	public function destroy($id){
		$this->Appointment->db_destroy($id);
		redirect('/');
	}
	public function edit($id){
		$this->logged_in_check();
		$result = $this->Appointment->prepopulate($id);
		$this->load->view('edit',array('id'=>$id, 'result'=>$result));
		
	}
	public function edit_appt($id){
		$result = $this->Appointment->db_edit_appt($id,$this->input->post());
		if ($result) {
			redirect('/');
		}
		else {
			$this->load->view('edit',array('id'=>$id));
		}
	}
	public function logged_in_check(){
		if (!$this->session->userdata('login')==true) {
			redirect('/');
		}
	}
}