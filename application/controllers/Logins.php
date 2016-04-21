<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
	}
	public function index(){
		if (!$this->session->userdata('login')) {
			$this->load->view('user_login');
		}
		else {
			$this->load->model('Book');
			$result = $this->Book->home();
			$this->load->view('home',array('result'=>$result));
		}
		
	}
	public function main() {
		$this->load->view('home');
	}
	public function login_process(){
		$result = $this->Login->db_login($this->input->post());
		if ($this->session->userdata('login') == TRUE) {
			redirect('/');
		}
		else {
			redirect('/');
		}
	}
	public function register(){
		$result = $this->Login->db_register($this->input->post());
		if ($result == TRUE) {
			$this->session->set_flashdata('message', '<p>Registration Successful</p>');
			redirect('/');
		}
		else {
			$this->index();
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}
}
