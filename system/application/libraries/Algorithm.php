<?php
	/**
	 * @auth	Hiep Pham
	 * @project	aibank
	 * @since	16/11/2010
	 * ******************************************
	 * @desc	Class Algorithm
     *          This is the main class of project
     *          (it don't have any attribute)
	 */
	
    class Algorithm{
        # constructor
        function Algorithm(){
            #
        }
        
        /**
         * Function	checkOnlyClass()
         * ------------------------------------
         * @desc	check if there is only 1 class
         *          (we have to do nothing here, just simply
         *          classify all object to 1 class)
         * @param	array of Customer Object
         * @return	true if only 1 class, else return false
         */
        
        public function checkOnlyClass($arrayCustomer){
            $currentClass=-1;
            foreach ($arrayCustomer as $customer){
                if (strcasecmp($currentClass,$customer->class)!=0){
                   if ($currentClass==-1){ 
                        $currentClass=$customer->class;
                        echo($currentClass);
                   } else {
                       echo($currentClass);
                       return false;
                   } 
                }
            }
            return true;
            /* insert your code here to complete */
            
        }
        
        /**
         * Function	calcInfo()
         * ------------------------------------
         * @desc	
         * @param	Customers Objects
         * @return	info
         */
        public function calcInfo($arrCus){
            $resultInfo = 0;
        	// để tính Info() tương ứng với 1 bảng HumanTable cần: 
        	// |S| = số thuộc tính trong bảng HumanTable
            $numAttr = 16;  // |S|
        	// gọi số bảng ghi có giá trị thuộc tính Class = Ci trong bảng HumanTable là Hi (i = 1,2,3: tương ứng với 3 độ rủi ro)
        	// --> tính Hi
            $hLow = MCustomers::countByClass($arrCus, 'low');
            $hMedium = MCustomers::countByClass($arrCus, 'medium');
            $hHigh = MCustomers::countByClass($arrCus, 'high');
        	// --> tính pi = Hi/|S|
        	$pLow = $hLow/$numAttr;
            $pMedium = $hMedium/$numAttr;
        	$pHigh = $hHigh/$numAttr;
            
        	// --> tính qi = -log(pi) --> log ở đây là loga cơ số 2
            if ($pLow != 0){
                $qLow = -(log($pLow)/log(2));
                $resultInfo += $pLow*$qLow;
            }
            if ($pMedium != 0){
                $qMedium = -(log($pMedium)/log(2));
                $resultInfo += $pMedium*$qMedium;
            }
            if ($pHigh != 0){
                $qHigh = -(log($pHigh)/log(2));
                $resultInfo += $pHigh*$qHigh;
            }
        	// info = p1*q1 + p2*q2 + p3*q3
            return $resultInfo;
        }
        
        /**
         * Function	calcInfoX()
         * ------------------------------------
         * @desc	
         * @param	Customer Object, name of attribute
         * @return	
         */
        
        public function calcInfoX($arrCus, $attrName){
            //tính InfoX tương ứng với thuộc tính AttributeOrdinal: 
        	$infoX = 0;
        	
        	// giả sử tập giá trị của thuộc tính AttributeOrdinal có n giá trị 
        	// chia bảng HumanTable thành n bảng T1, T2, ..., Tn ứng với n giá trị của thuộc tính AttributeOrdinal
        	// với mỗi bảng con Ti ta tính:
        	//	--> p(i)	= |Ti|/|T|
            $tmpMCus = new MCustomers();
            $valAttr = $tmpMCus->getDistinctValAttr($attrName);
            $total = count($valAttr);
            for ($i = 0 ; $i < $total; $i++){
                $tmp = array();
                foreach ($arrCus as $eachCus){
                    $eachCusArr = $eachCus->toArray();
                    if($eachCusArr[$attrName] == $valAttr[$i]){                        
                        array_push($tmp, $eachCus);
                    }
                }
                // var_dump($tmp);
                $infoCurrent = $this->calcInfo($tmp);
                $infoX += $infoCurrent*(count($tmp)/count($arrCus));
            }
        	//	tính giá tri info(i) tương ứng với bảng Ti 
        	//	--> info(i) = CalcInfo(Ti)
            
        	
        	//  --> tam(i)	= p(i) * info(i)
        
        
        	//  --> InfoX	= tổng tất cả các tam(i) - (i = 1,...,n)
        	return $infoX;
        }
        
        
        
        /**
         * Function	calcGain()
         * ------------------------------------
         * @desc	
         * @param	Array of Customer Objects,
         *          size of attribute value set
         * @return	
         */
        
        public function calcGain($arrCus, $attrName){
            // để tính Gain(X) ứng với thuộc tính X và bảng HumanTable ta cần:
        	// double	Gain, Info, InfoX;
        	// int		i, LoaiAttribute;
        	// LoaiAttribute = 0;
        	// --> tính Info(HumanTable) tương ứng với bảng HumanTable
        	$info	= $this->calcInfo($arrCus);
        	
        	// --> tính InfoX(HumanTable, AttributeOrdinal) ứng với thuộc tính X và bảng HumanTable
        	$infoX	= $this->calcInfoX($arrCus, $attrName);
        
        	// --> Gain = Info - InfoX
        	// Gain	= Info - InfoX;
        	return	($info - $infoX);
        }
        
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
        
        /**
         * Function	calcSplitInfo()
         * ------------------------------------
         * @desc	
         * @param	
         * @return	
         */
        
        public function calcSplitInfo($arrCus, $attrName){
            // tính giá trị SplitInfo
        	$splitInfo = 0;
        	// chia bảng HumanTable thành n bảng T1, T2, ..., Tn ứng với n giá trị của thuộc tính AttributeOrdinal
        	// |Ti| = số record trong bảng Ti
        	// với mỗi bảng con Ti ta tính: 
        	// --> p(i)		= |Ti|/|T|
            $tmpMCus = new MCustomers();
            $valAttr = $tmpMCus->getDistinctValAttr($attrName);
            $total = count($valAttr);
            for ($i = 0 ; $i < $total; $i++){
                $tmp = array();
                foreach ($arrCus as $eachCus){
                    $eachCusArr = $eachCus->toArray();
                    if($eachCusArr[$attrName] == $valAttr[$i]){                        
                        array_push($tmp, $eachCus);
                    }
                }
                $p = count($tmp)/count($arrCus);
                if ($p != 0){
                    $splitInfo -= $p*(log($p)/log(2));
                }
            }
        	// --> tam(i)	= -p(i) * log(p(i)) --> log là loga cơ số 2
        
        	//SplitInfo = tổng tất cả các tam(i) - i = 1,...n
        
        	return $splitInfo;
        }
        
        /**
         * Function	calcGainRatio()
         * ------------------------------------
         * @desc	
         * @param 	
         * @return	
         */
        
        public function calcGainRatio($arrCus, $attrName){
            // để tính GainRatio(X) ứng với mỗi thuộc tính X ta cần: 
	
        $gainRatio	= 0;
//        	double Gain			= 0;
//        	double SplitInfo	= 0;
        	// nếu thuộc tính là rời rạc
        		// --> tính Gain(X) ứng với thuộc tính X và bảng Human
        		$gain = $this->calcGain($arrCus, $attrName);
        
        		// --> tính SplitInfo(X) ứng với thuộc tính X và bảng Human
        		$splitInfo = $this->calcSplitInfo($arrCus, $attrName);
        
        		// --> GainRatio(X) = Gain(X)/SplitInfo(X);
        		$gainRatio = $gain/$splitInfo;
        
        	//nếu thuộc tính là liên tục
        		//
        	return $gainRatio;
        }
        
        
        public function gainRatioM($customerArray,$att,$moc){
            $info = $this->calcInfo($customerArray);
            $aboveMoc = array();
            $lowerMoc = array(); 
            foreach ($customerArray as $eachCus){
                $eachCusArr = $eachCus->toArray();
                if($eachCusArr[$maxRatioAtt] > $node->moc){                        
                    array_push($aboveMoc, $eachCus);
                }else{
                    array_push($lowerMoc, $eachCus);
                }                            
            }
            
            $pAbove =  sizeof($aboveMoc)/sizeof($customerArray);
            $pLower =  sizeof($lowerMoc)/sizeof($customerArray);  
            $infoX = ((sizeof($aboveMoc)/sizeof($customerArray))*$this->calcInfo($aboveMoc))+((sizeof($lowerMoc)/sizeof($customerArray))*$this->calcInfo($lowerMoc));
            $gainX = $info - $infoX;
            $slipInfoX = (-$pAbove)*(log($pAbove)/log(2))-($pLower)*(log($pLower)/log(2));
            $gainRatio = $gainX/$slipInfoX;
            return $gainRatio;            
        }
        public $i=0;
        public function buildTree($node,$customerArray){
            $this->i++;
            if ($this->checkOnlyClass($customerArray)){
                $node->type = 1;
                $node->label = 'class';
                $node->data = $customerArray[0]->class;
                //$node->save();                          
                echo "saved_leaf".$this->i;
                return;
            }else{
                //$node->save;
                echo "saved_normal".$this->i;
                
                $max=0;
                $maxRatioAtt;
                $forSearch = new Customer(); 
                foreach ($forSearch->attribute_array as $attribute){
                    $ratio = $this->calcGainRatio($customerArray,$attribute);
                    if ($max<$ratio){
                        $max=$ratio;
                        $maxRatioAtt = $attribute;                        
                    }
                }
                
                $node->type = 0;                
                
                $newNode = new TreeNode();
                $newNode->parent_id = $node->id;
                $newNode->type = 0; 
                $newNode->label = $maxRatioAtt;               
                
                if ($this->isContinueous($maxRatioAtt)){
                   $tmpMCus = new MCustomers();
                    $valAttr = $tmpMCus->getDistinctValAttr($maxRatioAtt);
                    $total = count($valAttr);
                    for ($i = 0 ; $i < $total-1; $i++){
                        for($j = i+1; $j<$total; $j++){
                            if ($valAttr[$i]>$valAttr[$j]){
                                $temp = $valAttr[$i];
                                $valAttr[$i] = $valAttr[$j];
                                $valAttr[$j] = $temp;
                            }    
                        }
                    }
                    $maxAtt = 0;
                    $maxTemp = 0;
                    for ($i = 0; $i<$total-1; $i++){
                        $temp = (float)($valAttr[$i]+$valAttr[$i+1])/2;
                        if ($maxAtt<$this->gainRatioM($customerArray, $maxRatioAtt, $temp)){
                            $maxAtt = $this->gainRatioM($customerArray, $maxRatioAtt, $temp); 
                            $maxTemp = $temp;                           
                        }
                    }
                    $moc = $maxTemp;
                    $aboveMoc = array();
                    $lowerMoc = array(); 
                    foreach ($customerArray as $eachCus){
                        $eachCusArr = $eachCus->toArray();
                        if($eachCusArr[$maxRatioAtt] > $moc){                        
                            array_push($aboveMoc, $eachCus);
                        }else{
                            array_push($lowerMoc, $eachCus);
                        }                            
                    }
                    
                    $newNode->data = ">".$moc;                    
                    $this->buildTree($newNode,$aboveMoc);
                    $newNode->data = "<".$moc;
                    $this->buildTree($newNode,$lowerMoc);
                    
                }else{
                    $tmpMCus = new MCustomers();
                    $valAttr = $tmpMCus->getDistinctValAttr($maxRatioAtt);
                    $total = count($valAttr);
                    for ($i = 0 ; $i < $total; $i++){
                        $tmp = array();
                        foreach ($customerArray as $eachCus){
                            $eachCusArr = $eachCus->toArray();
                            if($eachCusArr[$maxRatioAtt] == $valAttr[$i]){                        
                                array_push($tmp, $eachCus);
                            }                            
                        }
                        $newNode->data = $i;
                        $this->buildTree($newNode,$tmp);
                    }
                           
                }
                
            }
        }    
    }
?>