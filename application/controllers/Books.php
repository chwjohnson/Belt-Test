<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Book');
	}
	public function add(){
		$result = $this->Book->author();
		$this->load->view('add',array('result'=>$result));
	}
	public function add_book(){
		$this->Book->db_add_book($this->input->post());
		$this->add_review();
	}
	public function add_review(){
		$book_id = $this->Book->db_add_review($this->input->post());
		
		redirect('/Books/title/' . $book_id);
	}
	public function title($book_id){
		$reviews = $this->Book->get_reviews($book_id);

		$this->load->view('title', array('reviews'=>$reviews));
	}
	public function delete($id) {
		$book_id = $this->Book->db_delete_review($id);
		redirect('/Books/title/'. $book_id['book_id']);
	}
	public function user($id){
		$result = $this->Book->db_user_reviews($id);
		$this->load->view('user',array('result'=>$result));
	}
}