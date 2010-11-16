<?php
    class  Tree{
        const ROOT_TYPE = 'ROOT';
        const LEAF_TYPE = 'LEAF';
        const NORMAL_TYPE='NORMAL';
        
        private $id = null;
        private $type = Tree::NORMAL_TYPE;
        private $label;
        private $parentId = -1;
        private $data;
        private $level;
        
        public function Tree($id,$type,$label,$parentId,$data,$level){
            $this->id=$id;
            $this->setType($type);
            $this->setLabel($label);
            $this->setParentId($parentId);
            $this->setData($data);
            $this->setLevel($level);            
        }
        
        public function getId(){
            return $id;    
        }
        public function getType(){
            return $type;
        }
        public function setType($type){
            $this->type=$type;
        }
        public function getLabel(){
            return $label;
        }
        public function setLabel($label){
            $this->label=$label;
        }
        public function getParentId(){
            return $parentId;
        }
        public function setParentId($parentId){
            $this->parentId=$parentId;
        }        
        public function getData(){
            return $data;
        }
        public function setData($data){
            $this->data=$data;
        }
        public function getLevel(){
            return $level;
        }
        public function setLevel($level){
            $this->level=$level;
        }
    }
?>