<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model {
	public function db_add_book($values){
		$query = "INSERT INTO books (name, author, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
		if ($values['author2'] == null) {
			$add = array(
			$values['title'],
			$values['author1']
			);
		}
		else {
		$add = array(
			$values['title'],
			$values['author2']
			);
		}
		$this->db->query($query,$add);
	}
	public function db_add_review($values){
		$query1 = "SELECT * FROM books WHERE books.name = ?";
		$result1 = $this->db->query($query1, array($values['title']))->row_array();
		$query2 = "INSERT INTO reviews (content, rating, created_at, updated_at,user_id,book_id) VALUES (?,?,NOW(),NOW(),?,?)";
		
		$add = array(
			$values['content'],
			$values['rating'],
			$this->session->userdata('id'),
			$result1['id']
			);
		$this->db->query($query2,$add);
		return $result1['id'];
	}
	public function get_reviews($values){
		$query = "SELECT users.alias, books.name, books.author, reviews.id, reviews.user_id, reviews.book_id, reviews.rating, reviews.content, reviews.created_at FROM reviews JOIN books ON reviews.book_id = books.id JOIN users ON reviews.user_id = users.id WHERE books.id = ?";
		return $this->db->query($query,$values)->result_array();
	}
	public function db_delete_review($values){
		$query2 = "SELECT reviews.book_id FROM reviews WHERE id = ?";
		$result = $this->db->query($query2,$values)->row_array();
		$query = "DELETE FROM reviews WHERE id = ?";
		$this->db->query($query,$values);
		return $result;
	}
	public function db_user_reviews($id){
		$query1 = "SELECT reviews.user_id FROM reviews WHERE reviews.user_id = ?";
		$query2 = "SELECT users.first_name, users.last_name, users.alias, users.email, books.name, reviews.user_id, reviews.book_id FROM users JOIN reviews ON users.id = reviews.user_id JOIN books ON reviews.book_id = books.id WHERE users.id = ? GROUP BY books.name";
		$result1 = $this->db->query($query1,$id)->result_array();
		$result2 = $this->db->query($query2,$id)->result_array();
		return array($result1,$result2);
	}
	public function home(){
		$query1 = "SELECT books.name, books.id FROM books";
		$query2 = "SELECT books.id, books.name, users.id AS user_id, users.alias, reviews.rating, reviews.content, reviews.created_at FROM users JOIN reviews ON users.id = reviews.user_id JOIN books ON reviews.book_id = books.id ORDER BY reviews.created_at DESC LIMIT 3";
		$result1 = $this->db->query($query1)->result_array();
		$result2 = $this->db->query($query2)->result_array();
		return array($result1, $result2);
	}
	public function author(){
		$query = "SELECT books.author FROM books GROUP BY books.author";
		return $this->db->query($query)->result_array();
	}
}