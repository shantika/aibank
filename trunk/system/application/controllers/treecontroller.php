<?php
$this->load->library('Tree');
    class TreeController extends Controller{
        
        public function TreeController(){
            parent::Controller();
        }
        
        public function setRoot($tree){
            $tree->setType(Tree::ROOT_TYPE);
            $tree->setLevel(0);
            $tree->setParentId(-1);
            MTree::updateTree($tree);
        }
        
        
        
    }
?>