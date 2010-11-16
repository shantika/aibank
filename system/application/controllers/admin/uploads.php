<?php

class Uploads extends Controller {
  function Uploads(){
    parent::Controller();
    session_start();

	if ($_SESSION['userid'] < 1){
    	redirect('welcome/index','refresh');
    }
  }
  

  function index(){
	$data['title'] = "Manage Files";
	$data['main'] = 'admin_uploads_home';
	$data['files'] = $this->MUploads->getAllFiles();
	$data['tinymce'] = '';
	$this->load->vars($data);
	$this->load->view('dashboard');  
  }
  

  
  function create(){
   	if ($this->input->post('name')){
  		$this->MUploads->addFile();
  		$this->session->set_flashdata('message','File uploaded');
  		redirect('admin/uploads/index','refresh');
  	}else{
		$data['title'] = "Upoad File";
		$data['main'] = 'admin_uploads_create';
		$data['tinymce'] = '';
		$this->load->vars($data);
		$this->load->view('dashboard');    
	} 
  }
  
  function edit($id=0){
  	if ($this->input->post('name')){
  		$this->MUploads->updateFile();
  		$this->session->set_flashdata('message','File updated');
  		redirect('admin/uploads/index','refresh');
  	}else{
		//$id = $this->uri->segment(4);
		$data['title'] = "Update File";
		$data['main'] = 'admin_uploads_edit';
		$data['file'] = $this->MUploads->getFile($id);
		$data['tinymce'] = '';
		$this->load->vars($data);
		$this->load->view('dashboard');    
	}
  }
  
  function delete($id){
	//$id = $this->uri->segment(4);
	$this->MUploads->deleteFile($id);
	$this->session->set_flashdata('message','File deleted');
	redirect('admin/uploads/index','refresh');
  }


	
}//end class
?>