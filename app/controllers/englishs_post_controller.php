<?php

	class EnglishsPostController extends AppController{

		public $name = 'EnglishsPost';
		var $uses = array('englishTest','englishResult','userInfo');	
		
		public function beforeFilter() {
			$userId = $this -> Session-> read('userId');
			 if(isset($userId)){
			   $this->set('userId',$userId);
	   
			 }else{
			  $this->redirect(URL.'/login');
			}
		   }

		function index(){
	  
			//$date = date("Y/m/d H:i:s");
			$date = date("Y-m-d");
			$userId = $this -> Session-> read('userId');
	 //var_dump($userId); 
				$userId = $_POST['userId'];
	 //var_dump($userId); 
	 //$userId = "kassidy";
				$level = $_POST['level'];
			
				//活動回数のカウント
			 $actNo = $this->englishResult->find('first',array(
								'fields' => array('act_no'),
								'order' => array('act_no' => 'desc'),
								'conditions'=>array('user_id'=>$userId)
								)); 
				 $actNo = $actNo["englishResult"]["act_no"];
		
	 //var_dump($actNo); 
								
				 if(isset($actNo) || $actNo == NULL){
				 $actNo += 1;
				 }
	 
	 
			 //問題数をカウント
			 $data =   $this->englishTest->find('all' ,array(
					'conditions'=>array('status'=>0,'level'=>$level)
					));
			 $count = count($data);
				 
			 if($count >= 0){
				 //活動回数をuserInfoにupdate
					$data = array('userInfo.act_no'=>$actNo);
					$conditions = array('userInfo.user_id' => $userId);
					$registQuery = $this->userInfo->updateAll($data,$conditions); 
	 
					//結果判定
					for($i=0;$i < $count ; $i++){
			 
					 $question = $_POST[$i];
	 //var_dump($question);
					 $answer = $_POST['a'.$i];
	 //var_dump($answer);
					 $dbid = $_POST['b'.$i];
	 
					if($question === $answer){
						$result = 1;
				 //insert
						$data = array('englishResult' => array('user_id' => $userId,'title_no' => $dbid,'level' => $level,'answer' => $answer,'question' => $question ,'result' => $result,'act_no' =>$actNo,'current_date' => $date));
						$fields = array('user_id','title_no','level','answer','question','result','act_no','current_date');
						$this->englishResult->create(false);
						$registQuery = $this->englishResult->save($data,false,$fields);
					}elseif($question !== $answer){
						$result = 0;
						 //insert
						$retryFlg = 1;
						$data = array('englishResult' => array('user_id' => $userId,'title_no' => $dbid,'level' => $level, 'answer' => $answer,'question' => $question,'result' => $result,'act_no' =>$actNo,'current_date' => $date, 'retry_flg'=> $retryFlg));
						$fields = array('user_id','title_no','level','answer','question','result','act_no','current_date','retry_flg');
						$this->englishResult->create(false);
						$registQuery = $this->englishResult->save($data,false,$fields);
					}
				
					}
				 }
				 if($registQuery == true){
					$this->redirect(URL.'/result?level='.$level);
				}else{
					$this->redirect(URL.'/top');
			 }
	 //var_dump($count);	 
		 
			}



 }

