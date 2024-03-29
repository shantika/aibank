<?php
    class Home extends Controller{
        function __construct(){
            parent::Controller();
            session_start();
        }
        
        function index(){
            $this->load->library('encrypt');
            $status = $this->session->userdata('status');
            if (isset($status) && $status == 'OK'){
                redirect('admin/dashboard','refresh');
            }
            if ($this->input->post('username')){
                $u = $this->input->post('username');
                $pw = $this->input->post('password');
                $row = $this->MAdmins->verifyUser($u,$pw);
                if (count($row)){
                    $userdata = array(
                        'status' => 'OK',
                        'name' => $u
                    );
                    $this->session->set_userdata($userdata);
                    redirect('admin/dashboard','refresh');
                }else{
                    redirect('home/index','refresh');
                }
            }else{
                $data['title']  = 'Artificial Intelligence Bank'; 
                $data['base']   = $this->config->item('base_url');
                $data['css']    = $this->config->item('css');
                $this->load->view('login', $data);
            }
        }
        
        function logout(){
            $this->session->sess_destroy();
            redirect('home/index','refresh');
        }
        
        function testview(){
            $data['title']  = 'Artificial Intelligence Bank';
            $data['base']   = $this->config->item('base_url');
            $data['css']    = $this->config->item('css');
            $this->load->helper('form');
            $this->load->view('admin/admin_customers_create', $data);
        }
        
        function testclass(){
            $this->load->library('testclass');
            $this->testclass->getName();
            var_dump($this->testclass);
            $tmp = $this->testclass;
            $tmp->getSecret();
        }
    }
?>
