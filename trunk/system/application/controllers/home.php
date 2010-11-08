<?php
    class Home extends Controller{
        function __construct(){
            parent::Controller();
            session_start();
        }
        
        function index(){
            $this->load->library('encrypt');
            if ($this->input->post('username')){
                $u = $this->input->post('username');
                $pw = $this->input->post('password');
                $row = $this->MAdmins->verifyUser($u,$pw);
                if (count($row)){
                $_SESSION['userid'] = $row['id'];
                    redirect('admin/dashboard','refresh');
                }else{
                    redirect('home/index','refresh');
                }
            }else{
                $data['mywebtitle'] = 'Artificial Intelligence Bank'; 
                $data['base']       = $this->config->item('base_url');
                $data['css']        = $this->config->item('css');
                $this->load->helper('form');
                $this->load->view('login', $data);
            }
        }
    }
?>
