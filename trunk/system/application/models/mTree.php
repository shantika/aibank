<?php
$this->load->library('Tree');
    class  MTree extends Model{
        
        public function MTree(){
            parent::Model();
        }
        
        public static function getTreeById($id){
            
            $this->db->where('id',$id);
            $query = $this->db->get('tree');
            $resultTree;
            if ($query->num_rows() > 0){
                $row = $query->row_array();
                $resultTree = new Tree(
                    $row['id'],
                    $row['type'],
                    $row['label'],
                    $row['parentId'],
                    $row['data'],
                    $row['level']
                );
                return $resultTree;
            }else{
                return null;
            }           
        }
        
        public static function getLastTreeRoot(){
            $resultTree;
            $this->db->select('id');
            $this->db->where('level','0');
            $this->db->orderby('id','desc');
            $this->db->limit(1);
            $query = $this->db->get('tree'); 
            if ($query->num_rows() > 0){
                $row = $query->row_array();
                $resultTree = new Tree(
                    $row['id'],
                    $row['type'],
                    $row['label'],
                    $row['parentId'],
                    $row['data'],
                    $row['level']
                );
                return $resultTree;
            }else{
                return null;
            }          
        }
        
        public static function getTreeByParentIdAndData($pId,$data){
            $this->db->where('parent_id',$pId);
            $this->db->where('data',$data);
            $query = $this->db->get('tree');
            $arrResultTrees = array();
            if ($query->num_rows() > 0){
                foreach ($query->result() as $row) {
                    $tempTree = array(new Tree(
                        $row->id,
                        $row->type,
                        $row->label,
                        $row->parent_id,
                        $row->data,
                        $row->level
                    ));
                    $arrResultTrees = array_merge($arrResultTrees,$tempTree);
                }
                return $arrResultTrees;
            }else{
                return null;
            }            
        }
        
        public static function updateTree($tree){
            $insertData = array(
                    //'id' => $tree->getID(),
                    'type' => $tree->getType(),
                    'label' => $tree->getLabel(),
                    'parent_id' => $tree->getParentId(),
                    'data' => $tree->getData(),
                    'level' => $tree->getLevel(),
                );
            if ($tree->getId()==null){ 
                $this->db->insert('tree',$insertData);
            }else{
                $this->db->where('id', $tree->getID());
                $this->db->update('tree', $insertData);
            }
            
        }
    }
?>