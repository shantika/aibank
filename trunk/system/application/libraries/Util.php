<?php
class Util{
    public function isContinueous($attribute){
        if (
            (strcasecmp($attribute,'income')==0)||
            (strcasecmp($attribute,'familiar_income')==0)|| 
            (strcasecmp($attribute,'outcome')==0)||
            (strcasecmp($attribute,'money_owned')==0)||
            (strcasecmp($attribute,'dob_year')==0)
        ){
            return true;
        }else{
            return false;
        }  
    }
    
    public function calcAverageAttributeValue_1($attribute){
        //$this->load->library('Customer');
        $customerArray = MCustomers::getCustomerOrderBy($attribute);
        $customersNumber = sizeof($customerArray);
        if ($customersNumber>0){
         
            $attValue = -1;
            $numberOfAValue = 0;
            $aveOfAValue = 0;
 
            foreach ($customerArray as $customer){           
                $attributeArray = $customer->toArray();
                if ($attValue == $attributeArray[$attribute]){
                    $numberOfAValue++;                        
                }else{
                    if ($attValue == -1){                        
                    }else{
                        $aveOfAValue+=($attValue*((float)$numberOfAValue/$customersNumber));                                                
                    }
                    
                    $attValue = $attributeArray[$attribute];
                    $numberOfAValue = 1;                    
                }    
            }
            return $aveOfAValue;
        }else{
            return 0;
        }
    }
    
    public function calcSplitInfo($attribute){
        //$this->load->library('Customer');
        $customerArray = MCustomers::getCustomerOrderBy($attribute);
        $customersNumber = sizeof($customerArray);
        if ($customersNumber>0){
         
            $attValue = -1;
            $numberOfAValue = 0;
            $splitInfo = 0;
 
            foreach ($customerArray as $customer){ 
                          
                $attributeArray = $customer->toArray();
                //var_dump($attributeArray[$attribute]);
                if ($attValue == $attributeArray[$attribute]){
                    $numberOfAValue++;
                                             
                }else{
                    if ($attValue == -1){                        
                    }else{
                        //var_dump("_value:".$attValue."_");
                        $p = (float)$numberOfAValue/$customersNumber;
                        //var_dump("_p:".$p."_");
                        $tam = (-$p)*(log($p)/log(2));
                        //var_dump("_tam:".$tam."_");
                        $splitInfo+=$tam;
                        //var_dump("_splitI:".$splitInfo."_");                                               
                    }
                    
                    $attValue = (float)$attributeArray[$attribute];
                    //var_dump($attValue);
                    $numberOfAValue = 1;                    
                }    
            }
            return $splitInfo;
        }else{
            return 0;
        }
    }
}
?>
