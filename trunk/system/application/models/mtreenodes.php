<?php
    /**
	 * @auth	Hiep Pham
	 * @project	aibank
	 * @since	16/11/2010
	 * ******************************************
	 * @desc	Class MTreeNodes
	 */
	
    class MTreeNodes extends Model{
        # Variables
        public $id, $parent_id, $type, $label, $data;

        # Constructor
        function MTreeNodes(){
            parent::Model();
        }
        
        /**
         * Function	getNodeById()
         * ------------------------------------
         * @desc	retrieve a node from database
         * @param	$id
         * @return	MTreeNodes Object
         */
        
        public static function getNodeById($id){
            $tmp = new MTreeNodes();
            $tmp->db->where('id', $id);
            $tmp->db->limit(1);
            $Q = $tmp->db->get('treenodes');
            if ($Q->num_rows() >0 ){
                $row = $Q->row_object();
                return $row;
            }else{
                return null;
            }
        }
    }
?>