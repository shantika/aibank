<?php

class Categories extends Controller {
  function Categories(){
    parent::Controller();
    session_start();

	if ($_SESSION['userid'] < 1){
    	redirect('welcome/index','refresh');
    }
  }
  

  function index(){
	$data['title'] = "Manage Categories";
	$data['main'] = 'admin_cat_home';
	$data['categories'] = $this->MCats->getAllCategories();
	$data['tinymce'] = '';
	$this->load->vars($data);
	$this->load->view('dashboard');  
  }
  

  
  function create(){
   	if ($this->input->post('name')){
  		$this->MCats->addCategory();
  		$this->session->set_flashdata('message','Category created');
  		redirect('admin/categories/index','refresh');
  	}else{
		$data['title'] = "Create Category";
		$data['main'] = 'admin_cat_create';
		$data['categories'] = $this->MCats->getTopCategories();
		$data['tinymce'] = '';
		$this->load->vars($data);
		$this->load->view('dashboard');    
	} 
  }
  
  function edit($id=0){
  	if ($this->input->post('name')){
  		$this->MCats->updateCategory();
  		$this->session->set_flashdata('message','Category updated');
  		redirect('admin/categories/index','refresh');
  	}else{
		//$id = $this->uri->segment(4);
		$data['title'] = "Edit Category";
		$data['main'] = 'admin_cat_edit';
		$data['category'] = $this->MCats->getCategory($id);
		$data['categories'] = $this->MCats->getTopCategories();
		$data['tinymce'] = '';
		$this->load->vars($data);
		$this->load->view('dashboard');    
	}
  }
  
  function delete($id){
	//$id = $this->uri->segment(4);
	$this->MCats->deleteCategory($id);
	$this->session->set_flashdata('message','Category deleted');
	redirect('admin/categories/index','refresh');
  }

 
}//end class
?>