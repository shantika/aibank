<?php

class MAdmins extends Model{

	function MAdmins(){
		parent::Model();
	}


	function verifyUser($u,$pw){
		$this->db->select('id,username');
		$this->db->where('username',$u);
		$this->db->where('password', md5($pw));
		$this->db->where('status', 'active');
		$this->db->limit(1);
		$Q = $this->db->get('users');
		$this->session->set_userdata('lastquery', $this->db->last_query());
		if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			return $row;
		}else{
			$this->session->set_flashdata('error', 'Sorry, try again!');	
			return array();
		}		
	}

	function getUser($id){
      $data = array();
      $options = array('id' => $id);
      $Q = $this->db->getwhere('users',$options,1);
      if ($Q->num_rows() > 0){
        $data = $Q->row_array();
      }

      $Q->free_result();    
      return $data;  		

	}
	
	function getAllUsers(){
     $data = array();
     $Q = $this->db->get('users');
     if ($Q->num_rows() > 0){
       foreach ($Q->result_array() as $row){
         $data[] = $row;
       }
     }
     $Q->free_result();    
     return $data; 	
	}
	
	
	function addUser(){
      $data = array('username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'status' => $_POST['status'],
                    'password' => md5($_POST['password'])
                    );
	
	  $this->db->insert('users',$data);
	
	}
	
	function updateUser(){
      $data = array('username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'status' => $_POST['status'],
                    'password' => md5($_POST['password'])
                    );
	  $this->db->where('id',$_POST['id']);
	  $this->db->update('users',$data);	
	
	}
	
	
	function deleteUser($id){
 	 $data = array('status' => 'inactive');
 	 $this->db->where('id', $id);
	 $this->db->update('users', $data);
	
	}
	/*
	
	//check validity of email addie!
	function check_valid_email($email){
		$this->db->select('id,username');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->orderby('id','desc');
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$row = $Q->row();
			$newpw = md5('change_this_now!');
			$newdata = array('password' => md5($newpw));
			$this->db->where('id',$row->id);
			$this->db->update('users',$newdata);
			return $row->username . " " . $newpw;
		}else {
			return 'nopassword';
		}
	}	
	*/
}


?>