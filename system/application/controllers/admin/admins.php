<?php

class Admins extends Controller {
  function Admins(){
    parent::Controller();
    session_start();
    
	if ($_SESSION['userid'] < 1){
    	redirect('welcome/index','refresh');
    }
  }
  
  function index(){
	$data['title'] = "Manage Users";
	$data['main'] = 'admin_admins_home';
	$data['admins'] = $this->MAdmins->getAllUsers();
	$data['tinymce'] = '';
	$this->load->vars($data);
	$this->load->view('dashboard');  
  }
  

  
  function create(){
  	$this->load->library('encrypt');
   	if ($this->input->post('username')){
  		$this->MAdmins->addUser();
  		$this->session->set_flashdata('message','User created');
  		redirect('admin/admins/index','refresh');
  	}else{
		$data['title'] = "Create User";
		$data['main'] = 'admin_admins_create';
		$data['tinymce'] = '';
		$this->load->vars($data);
		$this->load->view('dashboard');    
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
		$data['main'] = 'admin_admins_edit';
		$data['admin'] = $this->MAdmins->getUser($id);
		$data['tinymce'] = '';
		$this->load->vars($data);
		$this->load->view('dashboard');    
	}
  }
  
  function delete($id){
	$this->MAdmins->deleteUser($id);
	$this->session->set_flashdata('message','User deleted');
	redirect('admin/admins/index','refresh');
  }
  
}


?>