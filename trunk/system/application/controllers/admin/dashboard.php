<?php

class Dashboard extends Controller {
  function Dashboard(){
    parent::Controller();
    session_start();
    
   if (!isset($_SESSION['target_ready'])){ $_SESSION['target_ready'] = false;  }
   
	if ($_SESSION['userid'] < 1){
    	redirect('home/index','refresh');
    }
  }
  
 
  function index(){	
	$data['title'] = "Dashboard Home";
	$this->load->vars($data);
	$this->load->view('dashboard');
  }
  

  
 function logout(){
	unset($_SESSION['userid']);
	$this->session->set_flashdata('error',"You've been logged out!");
	redirect('home/index','refresh'); 	
 }
 
}
?>