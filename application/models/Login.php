<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function db_login($post) {
		$query = "SELECT * FROM users where email = ?";
		$results = $this->db->query($query, $post['login_email'])->row_array();
		if ($post['login_email'] == $results['email']) {
			$password = md5($post['login_password'] . '' . $results['salt']);
			if ($password == $results['password']) {
				$this->session->set_userdata('first_name',$results['first_name']);
				$this->session->set_userdata('last_name',$results['last_name']);
				$this->session->set_userdata('email',$results['email']);
				$this->session->set_userdata('id',$results['id']);
				$this->session->set_userdata('login',true);
			}
			else {
				$this->session->set_userdata('password_error','Password is incorrect!');
			}
		}
		else {
			$this->session->set_userdata('email_error','Email is incorrect!');
		}
	}
	public function db_register($post) {
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|max_length[45]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|max_length[45]');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required|alpha_dash|max_length[45]|is_unique[users.alias]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[45]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			return FALSE;
		}
		else {
			$query = "INSERT INTO users (first_name, last_name, alias, email, password, salt, created_at, updated_at) VALUES (?,?,?,?,?,?, NOW(),NOW())";
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$old_password = $post['password'];
			$password = md5($old_password . '' . $salt);
			$first = $post['first_name'];
			$last = $post['last_name'];
			$email = $post['email'];
			$alias = $post['alias'];
			$user_info = array('first_name'=>$first,'last_name'=>$last,'alias'=>$alias,'email'=>$email,'password'=>$password,'salt'=>$salt);
			$this->db->query($query, $user_info);
			return TRUE;
		}
	}
}
