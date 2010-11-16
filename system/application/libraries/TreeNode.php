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
        public $id, $parent_id, $type, $label, $data, $level, $children;
        public $leaf_n, $leaf_e;    // for coverage, only has value if $type = 1,
                                    // i.e the current node is ah leaf
        
        function TreeNode(){
            $this->id = 0;
            $this->type = 0;
            $this->label = 'default label';
            $this->data = "";
            $this->children = array();
            $this->leaf_n = 0;
            $this->leaf_e = 0;
            $this->level = 0;            
        }
        
        /**
         * Function	setOption()
         * ------------------------------------
         * @desc	set method for specified field
         * @param	$name, $value
         * @return	true
         */
        
        public function setOption($name, $value){
            $this->{$name} = $value;
            return true;
        }        
        
        /**
         * Function	getInstance()
         * ------------------------------------
         * @desc	assign attributes of a treenode with
         *          respective value (set method)
         * @param	$id, $parent_id, $type, $label, $data
         * @return	TreeNode Object
         */
        
        public static function getInstance($id, $data, $parent_id, $type, $label, $data){
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
            $tmp = new MTreeNodes();
            $obj = $tmp->getNodeById($id);
            return TreeNode::getInstance($id, $obj->data, $obj->parent_id, $obj->type, $obj->label, $obj->data);
        }
        
        /**
         * Function	save()
         * ------------------------------------
         * @desc	this function will invoke add() in class MTreeNodes
         *          and save current object to database
         * @param	(no need)
         * @return	true if success, else return false
         */
        
        public function save(){
            $tmp = new MTreeNodes();
            $idNew = $tmp->addNewNode($this);
            if ($idNew != -1){
                $this->setOption('id', $idNew);
                return true;
            }else{
                return false;
            }
        }
        
        /**
         * Function	addChild()
         * ------------------------------------
         * @desc	add a child to the current node 
         * @param	TreeNode &$childNode
         * @return	(no need)
         */
        
        public function addChild($childNode){
            $childNode->level = $this->level+1;
            //$this->children[] = &$childNode;  Vua sua 1 ty. by Hacon
            $this->children = array_merge($this->children,array($childNode));
            $childNode->parent = $this;
            $childNode->parent_id = $this->id;
        }
        
        /**
         * Function	findChild()
         * ------------------------------------
         * @desc	find all child node of current node
         * @param	(no need)
         * @return	(no need)
         */
        
        public function findChild(){
            $tmp = new MTreeNodes();
            $children = $tmp->searchChild($this->id);
            
            if (count($children) > 0){
                foreach($children as $obj){
                    $eachChild = TreeNode::getInstance($obj->id, $obj->data, $obj->parent_id, $obj->type, $obj->label, $obj->data);
                    $this->addChild($eachChild);                    
                }
            } 
        }
	}
?>