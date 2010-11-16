<?php

class Customers extends Controller
{	
	function Customers()
	{
   		parent::Controller();
   		session_start();
    
		if ($_SESSION['userid'] < 1)
		{
   			redirect('welcome/index','refresh');
   		}
	}
  
	function index()
	{
		$data['title'] = "Manage Customers";
		$data['main'] = 'admin_customers_home';
		$data['customers'] = $this->MCustomers->getAllCustomers();
		$data['tinymce'] = '';
		$this->load->vars($data);
		$this->load->view('dashboard');  
  	}
  
	function create()
	{
  		$this->load->library('encrypt');
   		if ($this->input->post('name'))
		{
  			$this->MCustomers->addCustomer();
  			$this->session->set_flashdata('message','Customer created');
  			redirect('admin/customers/index','refresh');
  		}else
		{
			$data['title'] = "Create Customers";
			$data['main'] = 'admin_customers_create';
			$data['tinymce'] = '';
			$this->load->vars($data);
			$this->load->view('dashboard');    
		} 
  	}
  
  	function edit($id=0)
	{
  		//$this->load->library('encrypt');
  		if ($this->input->post('name'))
		{
  			$this->MCustomers->updateCustomer();
  			$this->session->set_flashdata('message','Customer updated');
  			redirect('admin/customers/index','refresh');
  		}else
		{
			//$id = $this->uri->segment(4);
			$data['title'] = "Edit Customer";
			$data['main'] = 'admin_customers_edit';
			$data['customer'] = $this->MCustomers->getCustomer($id);
			$data['tinymce'] = '';
			$this->load->vars($data);
			$this->load->view('dashboard');    
		}
  	}
  
  	function delete($id)
	{
		$this->MCustomers->deleteCustomer($id);
		$this->session->set_flashdata('message','Customer is now inactive');
		redirect('admin/customers/index','refresh');
  	}
  
}


?>