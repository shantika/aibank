<?php
//Class Customer by Hacon
class Customer{
    
       public $attribute_array = array(
                'dob_year',
                'job_position',
                'housing_status',
                'resident',
                'vehicle',
                'credit_quality',
                'education_level',
                'work_ex',     
                'insurance',    
                'is_marriage',   
                'dependants',   
                'money_owned',   
                'income',    
                'familiar_income',   
                'outcome',     
                ); 
                
    public $id;
    public $name;
    public $dobYear;
    public $info;
    public $jobPosition;
    public $jobContractPeriod;
    public $housingStatus;
    public $resident;
    public $vehicle;
    public $creditQuality;
    public $educationLevel;
    public $workEx;
    public $insurance;
    public $isMarriage;
    public $dependants;
    public $moneyOwned;
    public $income;
    public $familiarIncome;
    public $outcome;
    public $class;
    public $since;
    public $status;
    
    const CLASS_HIGH = 'high';
    const CLASS_MEDIUM = 'medium';
    const CLASS_LOW = 'low';        
    
    public function Customer(){}
    
    public function setOptions(
        $id,
        $name,
        $dobYear,
        $info,
        $jobPosition,
        $jobContractPeriod,
        $housingStatus,
        $resident,
        $vehicle,
        $creditQuality,
        $educationLevel,
        $workEx,
        $insurance,
        $isMarriage,
        $dependants,
        $moneyOwned,
        $income,
        $familiarIncome,
        $outcome,
        $class,
        $since,
        $status
    ){
        $this->id=$id;
        $this->name=$name;
        $this->dobYear=$dobYear;
        $this->info=$info;
        $this->jobPosition=$jobPosition;
        $this->jobContractPeriod=$jobContractPeriod;
        $this->housingStatus=$housingStatus;
        $this->resident=$resident;
        $this->vehicle=$vehicle;
        $this->creditQuality=$creditQuality;
        $this->educationLevel=$educationLevel;
        $this->workEx=$workEx;
        $this->insurance=$insurance;
        $this->isMarriage=$isMarriage;
        $this->dependants=$dependants;
        $this->moneyOwned=$moneyOwned;
        $this->income=$income;
        $this->familiarIncome=$familiarIncome;
        $this->outcome=$outcome;
        $this->class=$class;
        $this->since=$since;
        $this->status=$status;        
    }
    
    public function toArray(){
        $cusAtts = array(
                'dob_year' => $this->dobYear,
                'job_position' => $this->jobPosition,
                'housing_status' => $this->housingStatus,
                'resident' => $this->resident,
                'vehicle' => $this->vehicle,
                'credit_quality' => $this->creditQuality,
                'education_level' => $this->educationLevel,
                'work_ex' => $this->workEx,     
                'insurance' => $this->insurance,    
                'is_marriage' => $this->isMarriage,   
                'dependants' => $this->dependants,   
                'money_owned' => $this->moneyOwned,   
                'income' => $this->income,    
                'familiar_income' => $this->familiarIncome,   
                'outcome' => $this->outcome,    
                'class' => $this->class,   
                'since' => $this->since,   
                'status' => $this->status      
        );
        return $cusAtts;            
    }
    
   
    
}
?>
