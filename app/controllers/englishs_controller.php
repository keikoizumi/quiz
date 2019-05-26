<?php

class EnglishsController extends AppController{

public $name = 'Englishs';
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
	 
	 $userId = $this->Session->read('userId');
//var_dump($userId); 
	  
    $level = $_GET['level'];   

     $data =   $this->englishTest->find('all' ,array(
       //'conditions'=>array('status'=>0,'level'=>$level,'user_id'=>$userId)
       'conditions'=>array('status'=>0,'level'=>$level)
	     ));
	     
	  $count = count($data);
	  
	  if(!$count){
	     $message = "No data!!";
	      $this->set('message',$message);
	   }else{
	     $message = "";
	   }
	   
	 $this->set('level',$level);  
   $this->set('message',$message);
	 $this->set('data',$data);
	 $this->set('count',$count);
	 $this->set('userId',$userId);
	
	}
	
	function reTry(){
	  $userId = $this->Session->read('userId'); 
	  $level = $_GET['level'];
	  $this->set('level',$level);
	  
//	  $data = $this->englishResult->getUser();
	  
//	  $this->set('data',$data);
	  
	  $sql = "select DISTINCT title_no 
       from english_results 
       inner join english_tests 
       on english_tests.id = english_results.title_no 
       where english_tests.status = 0 
       and english_results.user_id = '".$userId."' 
       and english_results.result = 0 
       and english_results.retry_flg = 1
       and english_tests.level = '".$level."'
       order by retry_date desc;";
              
             
	  $data = $this->englishResult->query($sql);
	  
//	    $data = $this->englishResult->find('all',array(
//             'fields' => array('DISTINCT title_no'),
//             'conditions'=>array('user_id'=>$userId,'result'=>0)
//             ));
             
//var_dump($data);
        $count = count($data);
       
        if($data){
           //���o��
           for($i = 0;$i < $count; $i++){
           
//           $titleNo = $data[$i]['englishResult']['title_no'];
             $titleNo = $data[$i][0]['title_no'];
            $intTitleNo =intval($titleNo); 

           $tryData[$i] = $this->englishTest->find('first',array(
            'conditions'=>array('id'=>$intTitleNo,'status' => 0)
           ));
          
          
          $message = "";
          
           }
        }else{

          $message = "NO QUESTION";
          $tryData = null;
          
        }
	 $this->set('userId',$userId);
	 $this->set('message',$message);
	 $this->set('tryData',$tryData);
     $this->set('count',$count);
  }
  
   function record(){
	 $userId = $this->Session->read('userId'); 
	 $getTiteleNo = $_GET['titleNo'];
	 $getActNo = $_GET['actNo'];
	  
	 if(!$userId){	
	    $this->redirect(URL.'/login');
	  }
             
	  //���擾
	    $data = $this->englishResult->find('all',array(
             'fields' => array('title_no'),
             'conditions'=>array('user_id'=>$userId,'title_no'=>$getTiteleNo,'act_no'=>$getActNo)
             ));
//var_dump($data);            
        if($data){
           //���o��
           for($i = 0;$i < count($data); $i++){
           
            $titleNo = $data[$i]['englishResult']['title_no'];
            $intTitleNo =intval($titleNo); 
                    
//var_dump($intTitleNo);    
           $tryData[$i] = $this->englishTest->find('first',array(
            'conditions'=>array('id'=>$intTitleNo)
           ));

            $message = "";
           }
        }else{

          $message = "";
          
        }
	 $this->set('userId',$userId);
	 $this->set('message',$message);
	 $this->set('tryData',$tryData);
    
  }
  
  function before(){
   $userId = $this->Session->read('userId'); 
   $retry = $_GET['retry'];
  
   if ($retry == 0) {
    $retry = null;
   }else{
    $retry = 1;
   }
   
   $categorys = $this->englishTest->find('all',array(
             'fields' => array('DISTINCT level'),
             'conditions'=>array('status'=>0
             //                   ,'user_id'=>$userId
                                )
             )); 
    
    $this->set('categorys',$categorys);
    $this->set('retry',$retry);

	  if($retry == 1){
	    $this->set('retry',$retry);
	  }else{
	    $this->set('retry',"");
	  }
	  
	 if(!$userId){	
	    $this->redirect(URL.'/login');
	  }
             
     $this->set('userId',$userId);
    
  }
  
	
}

?>
