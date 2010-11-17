<?php

class Admins extends Controller {
  function Admins(){
    parent::Controller();
    session_start();
    
	if ($_SESSION['userid'] < 1){
    	redirect('home/index','refresh');
    }
  }
  
  function index(){
	$data['title'] = "Manage Users";
	$data['admins'] = $this->MAdmins->getAllUsers();
	$this->load->vars($data);
	$this->load->view('admin_admins_home');  
  }
  

  
  function create(){
  	$this->load->library('encrypt');
   	if ($this->input->post('username')){
  		$this->MAdmins->addUser();
  		$this->session->set_flashdata('message','User created');
  		redirect('admin/admins/index','refresh');
  	}else{
		$data['title'] = "Create User";
		$this->load->vars($data);
		$this->load->view('admin_admins_create');    
	} 
  }
  
  function edit($id=0){
  	$this->load->library('encrypt');
  	if ($this->input->post('username')){
  		$this->MAdmins->updateUser();
  		$this->session->set_flashdata('message','User updated');
  		redirect('admin/admins/index','refresh');
  	}else{
		//$id = $this->uri->segment(4);
		$data['title'] = "Edit User";
		$data['admin'] = $this->MAdmins->getUser($id);
		$this->load->vars($data);
		$this->load->view('admin_admins_edit');    
	}
  }
  
  function delete($id){
	$this->MAdmins->deleteUser($id);
	$this->session->set_flashdata('message','User deleted');
	redirect('admin/admins/index','refresh');
  }
  
}


?>