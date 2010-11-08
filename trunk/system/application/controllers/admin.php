<?php
    /**
     * @auth	Hiep Pham
     * @project	aibank
     * @since	05-11-2010
     * ******************************************
     * @desc	The Admin Controller
     */

    class Admin extends Controller{
        function __construct(){
            parent::Controller();
        }
        
        function dashboard(){
            // This is the main function of our project.
            // So please pay the most of your attention to it, guys!!!
            $data['mywebtitle'] = 'Dashboard - AI Bank'; 
            $data['base']       = $this->config->item('base_url');
            $data['css']        = $this->config->item('css');
            $this->load->helper('form');
            $this->load->view('dashboard', $data);
        }
    }
?>