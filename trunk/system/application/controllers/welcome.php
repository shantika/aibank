<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	    function index()
          {
          $data['myrobots']   = '<meta name="robots" content="noindex,nofollow">';
          $data['mywebtitle'] = 'Artificial Intelligence'; 
          $data['base']       = $this->config->item('base_url');
          $data['css']        = $this->config->item('css');
		  $this->load->helper('form');
          $this->load->view('login', $data);  
          }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */