<?php
    /**
     * @auth	Hiep Pham
     * @project	aibank
     * @since	05-11-2010
     * ******************************************
     * @desc	The model that handles all requests
     *          for verifying users
     */

    class MAdmins extends Model{
        function __construct(){
            parent::Model();
        }
        
        function verifyUser($u,$pw){
            $this->db->select('id');
            $this->db->where('username',$u);
            $this->db->where('password', md5($pw));
            $this->db->limit(1);
            $Q = $this->db->get('users');
            if ($Q->num_rows() > 0){
                $row = $Q->row_array();
                return $row;
            }else{
                return array();
            }
        }
    }

?>