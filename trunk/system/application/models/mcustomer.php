<?php
//mcustomer class by Hacon
class MCustomer extends Model{
    public function getAll(){
        $this->load->library('Customer');
        $query = $this->db->get('customers');
        $resultArray = array(); 
        if ($query->num_rows()>0){
            foreach ($query->result() as $row){
                
                $customer = new Customer();
                $customer->setOptions(
                    $row->id,
                    $row->name,
                    $row->dob_year,
                    $row->info,
                    $row->job_position,
                    $row->job_contract_period,
                    $row->housing_status,
                    $row->resident,
                    $row->vehicle,
                    $row->credit_quality,
                    $row->education_level,
                    $row->work_ex,                        
                    $row->insurance,
                    $row->is_marriage,
                    $row->dependants,
                    $row->money_owned,
                    $row->income,                         
                    $row->familiar_income,
                    $row->outcome,
                    $row->class,
                    $row->since,
                    $row->status
                );
                $resultArray=array_merge($resultArray,array($customer));    
            }
            return $resultArray;
        }else{
            return null;
        }            
    }
    
    public function getById($id){
        $this->load->library('Customer'); 
        $this->db->where('id',$id);
        $query = $this->db->get('customers'); 
        $customer;
        if ($query->num_rows()>0){
            $row = $query->row_array();
                $customer = new Customer();
                $customer->setOptions(
                    $row['id'],
                    $row['name'],
                    $row['dob_year'],
                    $row['info'],
                    $row['job_position'],
                    $row['job_contract_period'],
                    $row['housing_status'],
                    $row['resident'],
                    $row['vehicle'],
                    $row['credit_quality'],
                    $row['education_level'],
                    $row['work_ex'],                        
                    $row['insurance'],
                    $row['is_marriage'],
                    $row['dependants'],
                    $row['money_owned'],
                    $row['income'],                         
                    $row['familiar_income'],
                    $row['outcome'],
                    $row['class'],
                    $row['since'],
                    $row['status']
                );    
            return $customer;
        }else{
            return null;
        }                
    }

}  
?>
