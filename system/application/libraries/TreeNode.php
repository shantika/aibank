<?php
    /**
	 * @auth	Hiep Pham
	 * @project	aibank
	 * @since	16/11/2010
	 * ******************************************
	 * @desc	Class TreeNode
	 */
	
	class TreeNode{
        # Variables
        public $id, $parent_id, $type, $level, $label, $data;
       
        function TreeNode(){
        }
        
        /**
         * Function	getInstance()
         * ------------------------------------
         * @desc	assign attributes of a treenode with
         *          respective value (set method)
         * @param	$id, $parent_id, $type, $label, $data
         * @return	TreeNode Object
         */
        
        public static function getInstance($id, $data, $parent_id, $type="0", $label="default label", $data=""){
            $obj = new TreeNode();
            $obj->id = $id;
            $obj->data = $data;
            $obj->parent_id = $parent_id;
            $obj->type = $type;
            $obj->label = $label;
            $obj->data = $data;
            return $obj;                                                            
        }
        
        /**
         * Function	getTreeNodeById()
         * ------------------------------------
         * @desc	assign result data from database
         *          to an object
         * @param	$id
         * @return	TreeNode object
         */
        
        public static function getTreeNodeById($id){
            $tmp = MTreeNodes::getNodeById($id);
            return TreeNode::getInstance($id, $tmp->data, $tmp->parent_id, $tmp->type, $tmp->label, $tmp->data);
        }
	}
?>