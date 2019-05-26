<?php

class WithdrawController extends AppController{

    public $name = 'withdraw';
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

	 $userId = $this -> Session-> read('userId');
//var_dump($userId);	 
     if(isset($userId)){
	     $resUserId = $this->userInfo->find('all',array(
               'fields' => array('user_id'),
               'conditions'=>array('user_id'=>$userId)
               )); 
//var_dump($resUserId);     
	     if($userId == $resUserId[0]['userInfo']['user_id']){
				$registQuery = $this->englishTest->deleteAll(array('user_id' => $userId));  
	       $dalete = $this->userInfo->deleteAll(array('user_id' => $userId));
	       $_SESSION = array();
	       session_destroy();
//var_dump($daleteData);  	       
	       if($dalete){
	          $this->set('message','退会処理が成功しました。');
	       }else{
	          $this->set('message','退会処理に失敗しました2。');
	          $this->log('Withdraw2','error');
	       }
	     }else{  
	       $this->log('Withdraw3','error');
	       $this->set('message','退会処理に失敗しました3。');
	       
	     }
	     
	 }else{  
	     $this->log('Withdraw4','error');
	     $this->set('message','退会処理に失敗しました4。');
	     
	 }
   }
	
}
?>