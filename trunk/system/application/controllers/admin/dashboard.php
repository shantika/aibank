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
	$data['main'] = 'admin_home';
	$data['tinymce'] = '';
	$this->load->vars($data);
	$this->load->view('dashboard');
  }
  

  function build_site(){
/*  	
  	$this->load->helper('file');
  	$cats = $this->MCats->getPublishCats();
  	$pages = $this->MPages->getPublishPages();
  	$indexpages = $this->MPages->getIndexPages();
  	$files = $this->MUploads->getAllFiles();

  	$localnav = array();
  
   //create a navigation stack for each category area!
  	foreach ($cats as $id => $catpath){
  		if ($catpath != '/'){
  			foreach ($pages as $pid => $page){
  				if ($page['shownav'] == 'yes' && $page['category_id'] == $id && !eregi("index",$page['path'])){
	    			if (!preg_match("/\.html$/",$page['path'])){
  						$extra = ".html";
  					}else{
  						$extra = "";
  					}
  			
  					$localnav[$id][$pid] = $catpath . "/".$page['path'] . $extra;
  				}
  			}
  		}
  	}



  	if (count($pages) && count($cats)){
  		unset($cats[0]);
  		
  		//FIRST DELETE ALL OLD STUFF
  		//@delete_files(".".target_url(),TRUE);
  		shell_exec('rm -rf '. target_prep().'*');
  		
  		//echo target_prep();
  		//exit();
  		
  		//COPY OVER ASSETS
  		//@copy("./includes/stage_assets/",".".target_url());
  		//shell_exec('cp /includes/stage_assets/* '.target_url()) or die("what's the beef?");
  		shell_exec('rsync -avz  '.cms_prep().'includes/stage_assets/ '. target_prep());
  	
  		//NOW YOU MAY CREATE NEW CATS!
  		foreach ($cats as $id => $path){
  			@mkdir(target_prep().$path);
  		}
		@mkdir(target_prep()."files");
		
		
  		foreach ($pages as $page){
   			if (!preg_match("/\.html$/",$page['path'])){
  				$page['path'] .= ".html";
  			}
 
 			if ($page['category_id'] == 0 && $page['path'] == "index.html"){
  				$TEMPLATE = "public_home";
  				//$page['navigation_bar'] = "public_header";
  			}else{
  				$TEMPLATE = "public_inner";
  				//$page['navigation_bar'] = "public_header_inner";
  			}
  			
  			$page['navstack'] = $cats;
  			
  			if (isset($localnav[$page['category_id']])){
  				$page['localstack'] = $localnav[$page['category_id']];
  			}else{
  				$page['localstack'] = array();
  			}
  			
  	  		$page['URL'] = target_url();
			//$page['localname'] = $localname;
			$page['indexpages'] = $indexpages;
  			
  			
  			
  			$final = $this->load->view($TEMPLATE,$page,true);
  			
  			
  			
  			//2. determine path!
  			if ($page['category_id'] == 0){
  				$finalpath =  target_prep().$page['path'];
  			}else{
  				$finalpath = target_prep(). $cats[$page['category_id']] . "/" . $page['path'];
  			}
  			
  			//3. write to staging folder
  			if (!write_file($finalpath,$final)){
  				die("can't write to $finalpath!");
  			}
  			
  
  		}
  		
  		
		//don't forget uploaded files!
		if (count($files)){
			foreach ($files as $F){
				$file = $F['path'];
				@copy(cms_prep()."includes/uploads/$file", target_prep()."files/$file");
			}
		}
	
  		$_SESSION['target_ready'] = true;  			
  		redirect("admin/dashboard",'refresh');
  	
  	}else{
  		$this->session->set_flashdata('error', "No live pages or categories!");
  		redirect("admin/dashboard",'refresh');
  	}
  */
  }
  

  
 
 function logout(){
	unset($_SESSION['userid']);
	$this->session->set_flashdata('error',"You've been logged out!");
	redirect('home/index','refresh'); 	
 }
 
}
?>