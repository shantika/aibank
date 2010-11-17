<?php

class MCustomers extends Model{

	function MCustomers()
	{
		parent::Model();
	}


	function getCustomer($id)
	{
    	$data = array();
      	$options = array('id' => $id);
      	$Q = $this->db->getwhere('customers',$options,1);
      	if ($Q->num_rows() > 0)
		{
        	$data = $Q->row_array();
      	}
	    $Q->free_result();    
      	return $data;  		

	}
	
	
	
	function getAllCustomers()
	{
    	$data = array();
     	$Q = $this->db->get('customers');
     	if ($Q->num_rows() > 0)
		{
       		foreach ($Q->result_array() as $row)
			{
         		$data[] = $row;
       		}
     	}
     	$Q->free_result();    
     	return $data; 	
	 }
	
	
	function addCustomer()
	{
    	$data = array('name' => $_POST['name'],
                    'dob_year' => $_POST['dob_year'],
                    'info' => $_POST['info'],
					'job_position' => $_POST['job_position'],
					'job_contract_period' => $_POST['job_contract_period'],
					'housing_status' => $_POST['housing_status'],
					'resident' => $_POST['resident'],
					'vehicle' => $_POST['vehicle'],
					'credit_quality' => $_POST['credit_quality'],
					'education_level' => $_POST['education_level'],
					'work_ex' => $_POST['work_ex'],
					'insurance' => $_POST['insurance'],
					'is_marriage' => $_POST['is_marriage'],
					'dependants' => $_POST['dependants'],
					'money_owned' => $_POST['money_owned'],
					'income' => $_POST['income'],
					'familiar_income' => $_POST['familiar_income'],
					'outcome' => $_POST['outcome'],
					'class' => $_POST['class'],
					'since' => time(),
					'status' => '1'
                    );
	
	  	$this->db->insert('customers',$data);
	}
	
	function updateCustomer()
	{
    	$data = array('name' => $_POST['name'],
                    'dob_year' => $_POST['dob_year'],
                    'info' => $_POST['info'],
					'job_position' => $_POST['job_position'],
					'job_contract_period' => $_POST['job_contract_period'],
					'housing_status' => $_POST['housing_status'],
					'resident' => $_POST['resident'],
					'vehicle' => $_POST['vehicle'],
					'credit_quality' => $_POST['credit_quality'],
					'education_level' => $_POST['education_level'],
					'work_ex' => $_POST['work_ex'],
					'insurance' => $_POST['insurance'],
					'is_marriage' => $_POST['is_marriage'],
					'dependants' => $_POST['dependants'],
					'money_owned' => $_POST['money_owned'],
					'income' => $_POST['income'],
					'familiar_income' => $_POST['familiar_income'],
					'outcome' => $_POST['outcome'],
					'class' => $_POST['class'],
					'status' => $_POST['status']
                    );
	  	$this->db->where('id',$_POST['id']);
	  	$this->db->update('customers',$data);	
	}
	
	
	function deleteCustomer($id)
	{
 		$data = array('status' => 'inactive');
 	 	$this->db->where('id', $id);
	 	$this->db->update('customers',$data);
	}

}
?>