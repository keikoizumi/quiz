<?php

class LogoutController extends AppController{

    public $name = 'logout';
    var $uses = 'userInfo';
    
    
	function index(){

	 $userId = $this -> Session-> read('userId');
	 
     if(isset($userId)){
	    $resUserId = $this->userInfo->find('all',array(
               'fields' => array('user_id'),
               'conditions'=>array('user_id'=>$userId)
               ));
              
       if(isset($resUserId)){
        
	     if($userId == $resUserId[0]['userInfo']['user_id']){
 
	       $_SESSION = array();
	       session_destroy();
	 
	       $this->redirect(URL.'/login');
	       exit;
	     }else{  
	       $this->log('Failure Logout','error');
	       $this->redirect(URL.'/englishs');
	       exit;
	     }
	     
	   }
	 }else{  
	     $this->log('Failure Logout','error');
	     $this->redirect(URL.'/englishs');
	     exit;
	 }
   }
	
}
?>