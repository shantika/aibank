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
            //$this->load->library('treenode');            
            //$test = TreeNode::getTreeNodeById('1');
            //$test->findChild();
           //var_dump($test);
        }
        
        function customer(){

            $this->load->library('Customer'); 
            $this->load->library('TreeNode');
            $mC = new MCustomers();
            $cus = $mC->getById(11);
            
            //$root = new TreeNode();
            $root = TreeNode::getTreeNodeById(1);            
            //var_dump($root);
            $mT = new MTreeNodes();
            $test = $mT->getCustomerClass($root,$cus);
            
            var_dump($test);
        }
        
        function testCalc(){
            $this->load->library('Util');
            $ave = Util::calcSplitInfo('income');
            var_dump($ave);
        }
        
        function testf(){
            echo time();
        }
    }
?>
