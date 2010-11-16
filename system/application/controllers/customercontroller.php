<?php
class CustomerController extends Controller{
    public static function countByClass($customerArray,$class){
        $count = 0;
        foreach($customerArray as $customer){
            if (strcasecmp($class,$customer->class)) 
                $count++;
        }
        return $count;
    }    
}
?>
