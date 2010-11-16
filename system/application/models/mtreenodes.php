<?php
    /**
	 * @auth	Hiep Pham
	 * @project	aibank
	 * @since	16/11/2010
	 * ******************************************
	 * @desc	Class MTreeNodes
	 */
	
    class MTreeNodes extends Model{
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
        
        public function getNodeById($id){
            $this->db->where('id', $id);
            $this->db->limit(1);
            $Q = $this->db->get('treenodes');
            if ($Q->num_rows() >0 ){
                $row = $Q->row_object();
                return $row;
            }else{
                return null;
            }
        }
        
        /**
         * Function	addNewNode()
         * ------------------------------------
         * @desc	as the name, this function will add a node to database
         * @param	TreeNode &$treeNode
         * @return	id if success, else return -1
         */
        
        public function addNewNode($treeNode){
            $this->db->set('parent_id', $treeNode->parent_id);
            $this->db->set('type', $treeNode->type);
            $this->db->set('label', $treeNode->label);
            $this->db->set('data', $treeNode->data);
            $this->db->set('leaf_n', $treeNode->leaf_n);
            $this->db->set('leaf_e', $treeNode->leaf_e);
            if ($this->db->insert('treenodes')){
                return $this->db->insert_id();   
            }else{
                return -1;
            }
        }
        
        /**
         * Function	searchChild()
         * ------------------------------------
         * @desc	search all children of a node  
         * @param	id of ancestor
         * @return	Array of object
         */
        
        public function searchChild($pid){
            // $this->db->select('id');
            $this->db->where('parent_id', $pid);
            $this->db->limit(10);
            $Q = $this->db->get('treenodes'); 
            if ($Q->num_rows() > 0){
                $result = $Q->result_object();
                return $result;
            }else{
                return array();
            }
        }
        
        
        public function getCustomerClass($root, $customer){
            $this->load->library('Customer');
            $this->load->library('TreeNode');
            var_dump($customer);
            $attributeArray = $customer->toArray();
            $currentNode=$root;
            while ($currentNode->type!=1){
                $currentNode->findChild();                 
                $currentChildren = $currentNode->children; 
                if (sizeof($currentChildren)>0){
                    $data = $attributeArray[$currentChildren[0]->label];
                    $found=0;
                    foreach ($currentChildren as $children){
                        //var_dump($children);
                        //var_dump("_id:".$currentNode->id.",children:id".$children->id.",".$children->data."?".$data."_");
                        if ($children->type==1){
                            //var_dump($children->data);
                            return $children->data;
                        }
                        if (strcasecmp($children->data,$data)==0){
                            $currentNode=$children;//TreeNode::getTreeNodeById($children->id);
                            var_dump("__trace1:".$children->id."_");
                            $found=1;
                            break;
                        }
                        if ($children->data==$data){
                            $currentNode=$children;//TreeNode::getTreeNodeById($children->id);
                            var_dump("__trace2:".$children->id."_"); 
                            $found=1;
                            break;
                        }                     
                    }
                    if ($found==0){
                        //var_dump($currentNode->id);
                        echo "error_nochild_match";
                        return null;
                    }
                }else{
                    echo "error_nochild";
                    return null;
                }    
            }
            var_dump($currentNode->data);
            return $currentNode->data;
        }
    }
?>