<?php

class Customers extends Controller
{	
	function Customers()
	{
   		parent::Controller();
   		session_start();
    
		if ($_SESSION['userid'] < 1)
		{
   			redirect('home/index','refresh');
   		}
	}
  
	function index()
	{
		$data['title'] = "Manage Customers";
		$data['customers'] = $this->MCustomers->getAllCustomers();
		$this->load->vars($data);
		$this->load->view('admin_customers_home');  
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
			$this->load->vars($data);
			$this->load->view('admin_customers_create');    
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
			$data['customer'] = $this->MCustomers->getCustomer($id);
			$this->load->vars($data);
			$this->load->view('admin_customers_edit');    
		}
  	}
  
  	function delete($id)
	{
		$this->MCustomers->deleteCustomer($id);
		$this->session->set_flashdata('message','Customer is now inactive');
		redirect('admin/customers/index','refresh');
  	}
	
	function training() 
	{	
		$data['title'] = "Training";
		$this->load->vars($data);
		$this->load->view('admin_customers_training');
		$this->session->set_flashdata('message','Training is now completed');
		redirect('admin/customers/index','refresh');
	}
	
	
}


?>