<?php

    class TreeController extends Controller{
         
        public function TreeController(){
            parent::Controller();
        }
        
        public function setRoot($tree){
            $this->load->library('Tree');
            $tree->setType(Tree::ROOT_TYPE);
            $tree->setLevel(0);
            $tree->setParentId(-1);
            MTree::updateTree($tree);
        }
        
        //input conditions la 1 array chua dieu kien duyet
        // em chua hiu thuat toan nen cu de tam the nay, NAH xem qua rui bao em sua ntn
        
        public function search($conditions){
            $root = MTree::getLastTreeRoot();
            $curNode = $root;
            $i = 0;
            $arrResultTree = array($root);
            while (strcasecmp($curNode->getType(),Tree::LEAF_TYPE)!=0){
                  $temp = MTree::getTreeByParentIdAndData($curNode->getId(),$conditions[i]);
                  if ($temp == null){
                      break;
                  }elseif(sizeof($temp)>1){
                      return null;
                  }else{
                      $curNode = $temp[0];
                      $arrResultTree = array_merge($arrResultTree,array($curNode));  
                  }
            }
            return $arrResultTree;
        }
        

    }
?>