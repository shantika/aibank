<?php

class Welcome extends Controller {
  function Welcome(){
    parent::Controller();
    session_start();
  }

  function index(){	
  	$this->load->library('encrypt');
	if ($this->input->post('username')){
		$u = $this->input->post('username');
		$pw = $this->input->post('password');
		$row = $this->MAdmins->verifyUser($u,$pw);
		//echo $this->session->userdata('lastquery');
		//$row =array('id' => '1', 'username' => 'tmyer');
		//echo md5('change_this_now!');
		if (count($row)){
			$_SESSION['userid'] = $row['id'];
			//$_SESSION['username'] = $row['username'];
			redirect('admin/dashboard','refresh');
		}else{
			redirect('welcome/index','refresh');
		}
	}else{
		$data['title'] = "Welcome to the MicroSite Manager";
		$data['main'] = 'login';
		$this->load->vars($data);
		$this->load->view('template');
	}
  }


	function forgotpw(){
	
		if ($_POST){
			$email = $this->input->post('email');
			$pw = $this->MAdmins->check_valid_email($email); 
			if ($pw != 'nopassword'){
				
				$this->_send_reminder_email($email,$pw);
				$data['title'] = "Password Reminder Sent";
				$data['main'] = 'forgot_sent';
			}else{

				$data['title'] = "Password Reminder Not Sent";
				$data['main'] = 'forgot_notsent';			
			}
			$this->load->vars($data);
			$this->load->view('template');


		}else{
			$data['title'] = "I forgot my password!";
			$data['main'] = 'forgot';
			$this->load->vars($data);
			$this->load->view('template');
		}
	}//end forgotpw


	function _send_reminder_email($email,$pw){
		$this->email->from('noreply@lifesize.com', 'LifeSize Microsite Admin');
		$this->email->to($email);		
		$this->email->subject("Password Change");
		$msg = "This is a notice that we've changed your password. Your username/password combo is: \r\n\r\n$pw\r\n\r\nYou can login at:\r\n\r\n";
		$msg .= base_url() . "welcome/index\n\n";
		$this->email->message($msg);		
		$this->email->send();
	}  
}//end controller class

?>